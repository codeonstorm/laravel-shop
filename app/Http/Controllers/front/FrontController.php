<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use Mail;

class FrontController extends Controller
{

    public function index()
    {

        $result['home_categories']=
        DB::table('categories')
        ->where(['status'=>1])
        ->where(['is_home'=>1])
        ->get();

       //home banner
  /*     $result['home_banner']=DB::table('home_banners')
      ->where(['status'=>1])
      ->get();
      */
      // featured products
      // trending products
      $result['home_featured_product']=
       DB::table('products')
       ->where(['status'=>1])
       ->where(['is_featured'=>1])
       ->paginate(5);

       foreach($result['home_featured_product'] as $list){
           $result['home_featured_product_attr'][$list->id]=
               DB::table('product_attributes as attr')
              // ->leftJoin('sizes','sizes.id','=','product_attributes.size_id')
              // ->leftJoin('colors','colors.id','=','product_attributes.color_id')
               ->leftJoin('product_images','product_images.product_attributes_id','=','attr.id')
               ->where(['attr.product_id'=>$list->id])
               ->first(['attr.id as attr_id', 'attr.price', 'attr.mrp', 'product_images.img']);

               foreach($result['home_featured_product_attr'] as $attrlist){

                   $result['home_featured_attr_img'][$attrlist->attr_id]=
                   DB::table('product_images')
                   ->where(['product_attributes_id'=>$attrlist->attr_id])->first('img');
               }
       }




      // trending products
      $result['home_tranding_product']=
       DB::table('products')
       ->where(['status'=>1])
       ->where(['is_tranding'=>1])
       ->paginate(5);

       foreach($result['home_tranding_product'] as $list){
           $result['home_tranding_product_attr'][$list->id]=
               DB::table('product_attributes as attr')
              // ->leftJoin('sizes','sizes.id','=','product_attributes.size_id')
              // ->leftJoin('colors','colors.id','=','product_attributes.color_id')
               ->leftJoin('product_images','product_images.product_attributes_id','=','attr.id')
               ->where(['attr.product_id'=>$list->id])
               ->first(['attr.id as attr_id', 'attr.price', 'attr.mrp', 'product_images.img']);
       }

//prx($result);
        return view('front.index', $result);
    }


    public function category(Request $request,$slug)
  {
      $sort="";
      $sort_txt="";
      $filter_price_start="";
      $filter_price_end="";
      $color_filter="";
      $colorFilterArr=[];
      $size_filter="";
      $sizeFilterArr=[];
      if($request->get('sort')!==null){
          $sort=$request->get('sort');
      }
      

      $query=DB::table('products');
      $query=$query->leftJoin('categories','categories.id','=','products.cat_id');
      $query=$query->leftJoin('product_attributes','products.id','=','product_attributes.product_id');
      $query=$query->where(['products.status'=>1]);
      $query=$query->where(['categories.slug'=>$slug]);
      if($sort=='name'){
          $query=$query->orderBy('products.name','asc');
          $sort_txt="Product Name";
      }
      if($sort=='date'){
          $query=$query->orderBy('products.id','desc');
          $sort_txt="Date";
      }
      if($sort=='price_desc'){
          $query=$query->orderBy('product_attributes.price','desc');
          $sort_txt="Price - DESC";
      }if($sort=='price_asc'){
          $query=$query->orderBy('product_attributes.price','asc');
          $sort_txt="Price - ASC";
      }
      if($request->get('filter_price_start')!==null && $request->get('filter_price_end')!==null){
          $filter_price_start=$request->get('filter_price_start');
          $filter_price_end=$request->get('filter_price_end');

          if($filter_price_start>0 && $filter_price_end>0){
              $query=$query->whereBetween('products_attr.price',[$filter_price_start,$filter_price_end]);
          }
      }

      if($request->get('color_filter')!==null){
          $color_filter=$request->get('color_filter');
          $colorFilterArr=explode(":",$color_filter);
          $colorFilterArr=array_filter($colorFilterArr);
          $query=$query->whereIn('product_attributes.color_id',$colorFilterArr);

      }

      if($request->get('size_filter')!==null){
        $size_filter=$request->get('size_filter');
        $sizeFilterArr=explode(":",$size_filter);
        $sizeFilterArr=array_filter($sizeFilterArr);
    
        $query=$query->whereIn('product_attributes.size_id',$sizeFilterArr);
    }
 
      $query=$query->distinct()->select('products.*', 'categories.name as category', 'categories.slug as cat_slug');
      $query=$query->get(); 
      if($query->isEmpty()){
        prx('data not found');
      }

      $result['product']=$query;


      $arrSize=[];
      $arrColor=[];
      foreach($result['product'] as $list1){

          $query1=DB::table('product_attributes');
          $query1=$query1->leftJoin('sizes','sizes.id','=','product_attributes.size_id');
          $query1=$query1->leftJoin('colors','colors.id','=','product_attributes.color_id');
          $query1=$query1->leftJoin('product_images','product_images.product_attributes_id','=','product_attributes.id');
          $query1=$query1->where(['product_attributes.product_id'=>$list1->id]);
          $query1=$query1->get();
          $result['product_attributes'][$list1->id]=$query1;

          foreach($query1 as $attr){
            $arrSize[]=$attr->size;
            if(!empty($attr->name)){ //check latter      
                $arrColor[$attr->name]['id']=$attr->color_id;
                $arrColor[$attr->name]['code']=$attr->code;
            }
          }
         
      }
 
      $result['sizes']=array_filter(array_unique($arrSize));
      $result['colors']=$arrColor;

      $result['sizes_left']=DB::table('sizes')
      ->where(['status'=>1])->get();
      
      $result['categories_left']=DB::table('categories')
      ->where(['parent_id'=>$result['product'][0]->cat_id])
      ->where(['status'=>1])
      ->get();
      //prx($result);
/*
      $result['slug']=$slug;
      $result['sort']=$sort;
      $result['sort_txt']=$sort_txt;
      $result['filter_price_start']=$filter_price_start;
      $result['filter_price_end']=$filter_price_end;*/
      $result['color_filter']=$color_filter;
      $result['colorFilterArr']=$colorFilterArr; 
      $result['size_filter']=$size_filter;
      $result['sizeFilterArr']=$sizeFilterArr; 
       // prx($result);
      return view('front.category',$result);
  }


  public function product(Request $request,$slug,$color='',$attr_id='')
  {
          $result['product']=
           DB::table('products')
           ->where(['status'=>1])
           ->where(['slug'=>$slug])
           ->first();


           if(isset($result['product'])){

           $result['product_attr']=
               DB::table('product_attributes as pAttr')
               ->leftJoin('sizes','sizes.id','=','pAttr.size_id')
               ->leftJoin('colors','colors.id','=','pAttr.color_id')
               ->where(['pAttr.product_id'=>$result['product']->id])
               ->get(['pAttr.*','sizes.size', 'colors.name', 'colors.code']);
              
               //color based product 
               if($color!=''){
                    $attrobj=
                    DB::table('product_attributes as pAttr')
                    ->leftJoin('colors','colors.id','=','pAttr.color_id')
                    ->where(['pAttr.product_id'=>$result['product']->id])
                    ->where(['colors.name'=>$color])
                    ->first(['pAttr.id']);
                    if($attrobj)
                        $result['attr__id']=$attrobj->id;
                    
               } else{
                $color = $result['product_attr'][0]->name;//colorname
               }         
               
            $arrSize=[];
            $arrColor=[];
            //product images
            foreach($result['product_attr'] as $attrlist){
                $result['product_attr_img'][$attrlist->id]=
                DB::table('product_images')
                ->where(['product_attributes_id'=>$attrlist->id])
                ->get('img');

                
                if($attrlist->name==$color){
                    if($attrlist->size!='')
                     $arrSize[]=$attrlist->size;
                }
                if($attrlist->name!='')
                    $arrColor[]=$attrlist->name;

                // product attribute id here $color is a get attribute id
                if($color){
                 if($attrlist->id == $color)
                    $result['attr__id']=$attrlist->id;
                }
               
            }
            
            $result['sizes']=array_unique($arrSize);
            $result['colors']=array_unique($arrColor);




       /** related product **/
       $result['related_product']=
           DB::table('products')
           ->where(['status'=>1])
           ->where('slug','!=',$slug)
           ->where(['cat_id'=>$result['product']->cat_id])
           ->get();
           if(isset($result['product'])){

           }

       foreach($result['related_product'] as $list1){
           $result['related_product_attr'][$list1->id]=
               DB::table('product_attributes as pAttr')
               ->leftJoin('sizes','sizes.id','=','pAttr.size_id')
               ->leftJoin('colors','colors.id','=','pAttr.color_id')
               ->where(['pAttr.product_id'=>$list1->id])
              ->get(['pAttr.*','sizes.size', 'colors.name', 'colors.code']);

              foreach($result['related_product_attr'][$list1->id] as $attrlist){
                  $result['related_product_attr_img'][$attrlist->id]=
                  DB::table('product_images')
                  ->where(['product_attributes_id'=>$attrlist->id])->first('img');
              }
       }





  /*     $result['product_review']=
               DB::table('product_review')
               ->leftJoin('customers','customers.id','=','product_review.customer_id')
               ->where(['product_review.products_id'=>$result['product']->id])
               ->where(['product_review.status'=>1])
               ->orderBy('product_review.added_on','desc')
               ->select('product_review.rating','product_review.review','product_review.added_on','customers.name')
               ->get();*/
       //
     }
//prx($result);
       return view('front.product',$result);
  }


  public function search(Request $request)
  {
          $str=$request->get('search');
          $query=DB::table('products');
          $query=$query->leftJoin('categories','categories.id','=','products.cat_id');
          $query=$query->leftJoin('product_attributes','products.id','=','product_attributes.product_id');
          $query=$query->where(['products.status'=>1]);
          $query=$query->where('products.name','like',"%$str%");
          $query=$query->orwhere('products.short_desc','like',"%$str%");
          $query=$query->orwhere('products.desc','like',"%$str%");
          $query=$query->orwhere('products.keywords','like',"%$str%");
          $query=$query->orwhere('categories.name','like',"%$str%");
          $query=$query->distinct()->select('products.*');
          $query=$query->get();
          $result['product']=$query;


      foreach($result['product'] as $list1){

          $query1=DB::table('product_attributes');
          $query1=$query1->leftJoin('sizes','sizes.id','=','product_attributes.size_id');
          $query1=$query1->leftJoin('colors','colors.id','=','product_attributes.color_id');
          $query1=$query1->leftJoin('product_images','product_images.product_attributes_id','=','product_attributes.id');
          $query1=$query1->where(['product_attributes.product_id'=>$list1->id]);
          $query1=$query1->get();
          $result['product_attributes'][$list1->id]=$query1;    
      }
     // prx($result);
      return view('front.search',$result);
  }

  public function add_to_cart(Request $request)
  {

      if($request->session()->has('USER_ID')){
          $uid=$request->session()->get('USER_ID');
          $user_type="Reg";
      }else{
          $uid=getUserTempId();
          $user_type="Not-Reg";
      }

      /*$size_id=$request->post('size_id');
      $color_id=$request->post('color_id');
      $product_id=$request->post('product_id');*/
      $pqty=$request->post('qty');
      $product_attr_id=$request->post('product_attr_id');
/*
      $result=DB::table('product_attributes as attr')
          ->select('attr.id')
          ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
          ->leftJoin('colors','colors.id','=','products_attr.color_id')
          ->where(['products_id'=>$product_id])
          ->where(['sizes.size'=>$size_id])
          ->where(['colors.color'=>$color_id])
          ->get();
      $product_attr_id=$result[0]->id;
*/

    /*  $getAvaliableQty=getAvaliableQty($product_attr_id);
      $finalAvaliable=$getAvaliableQty[0]->pqty-$getAvaliableQty[0]->qty;
      if($pqty>$finalAvaliable){
          return response()->json(['msg'=>"not_avaliable",'data'=>"Only $finalAvaliable left"]);
      }
*/

      $check=DB::table('carts')
          ->where(['user_id'=>$uid])
          ->where(['user_type'=>$user_type])
        //  ->where(['product_id'=>$product_id])
          ->where(['product_attr_id'=>$product_attr_id])
          ->get();

      if(isset($check[0])){
          $update_id=$check[0]->id;
          if($pqty==0){
              DB::table('carts')
                  ->where(['id'=>$update_id])
                  ->delete();
              $msg="removed";
          }else{
              DB::table('carts')
                  ->where(['id'=>$update_id])
                  ->update(['qty'=>$pqty]);
              $msg="updated";
          }

      }else{
          $id=DB::table('carts')->insertGetId([
              'user_id'=>$uid,
              'user_type'=>$user_type,

              'product_attr_id'=>$product_attr_id,
              'qty'=>$pqty,
              'created_at'=>date('Y-m-d h:i:s'),
              'updated_at'=>date('Y-m-d h:i:s')
          ]);
          $msg="added";
      }

      $result=DB::table('carts')
          ->leftJoin('product_attributes as attr','attr.id','=','carts.product_attr_id')
          ->leftJoin('products','products.id','=','attr.product_id')
          ->leftJoin('sizes','sizes.id','=','attr.size_id')
          ->leftJoin('colors','colors.id','=','attr.color_id')
          ->where(['user_id'=>$uid])
          ->where(['user_type'=>$user_type])
          ->select('carts.qty','products.name','sizes.size','colors.name','attr.price','products.slug','products.id as pid','attr.id as attr_id')
          ->get();
      return response()->json(['msg'=>$msg,'data'=>$result,'totalItem'=>count($result)]);

  }


  public function cart(Request $request)
  {    
      if($request->session()->has('USER_ID')){
          $uid=$request->session()->get('USER_ID');
          $user_type="Reg";
      }else{
          $uid=getUserTempId();
          $user_type="Not-Reg";
      }
      $result['list']=DB::table('carts')
          ->leftJoin('product_attributes','product_attributes.id','=','carts.product_attr_id')
          ->leftJoin('products','products.id','=','product_attributes.product_id')
          ->leftJoin('sizes','sizes.id','=','product_attributes.size_id')
          ->leftJoin('colors','colors.id','=','product_attributes.color_id')
          ->where(['user_id'=>$uid])
          ->where(['user_type'=>$user_type])
          ->select('carts.qty','products.name', 'products.short_desc','sizes.size','colors.name as color','product_attributes.price','products.slug','products.id as pid','product_attributes.id as attr_id')
          ->get();

          foreach ($result['list'] as  $list) {
            $result['list_img'][$list->attr_id] =
            DB::table('product_images')
            ->where('product_attributes_id','=',$list->attr_id)->first('img');
          }

       
          // prx($result);
            return view('front.cart',$result);

  }




      public function checkout(Request $request)
       {
           $result['cart_data']=getAddToCartTotalItem();
           if(isset($result['cart_data'][0])){

               if($request->session()->has('USER_ID')){
                   $uid=$request->session()->get('USER_ID');
                   $result['users']=DB::table('users')
                           ->leftJoin('user_details', 'user_details.user_id','=','users.id')
                       ->where('users.id',$uid)
                        ->first(['name','email','mobile','address','city','state','zip']);

               }

               return view('front.checkout',$result);
           }else{
               return redirect('/');
           }
       }



       public function place_order(Request $request)
       {
           $payment_url='';
           $rand_id=rand(111111111,999999999);

           if($request->session()->has('USER_ID')){

           }else{
             $valid=Validator::make($request->all(),[

                 "email"=>'required|email|unique:users,email',

            ]);

               if(!$valid->passes()){
                   return response()->json(['status'=>'error','msg'=>"The email has already been taken"]);

               }else{
                   $user_arr=[
                       "name"=>$request->name,
                       "email"=>$request->email,
                       "mobile"=>$request->mobile,
                       "password"=>Hash::make($rand_id),
                       "mobile"=>$request->mobile,
                       "status"=>1,
                       "email_verified_at"=>date('Y-m-d h:i:s'),
                       "rand_id"=>$rand_id,
                       'role_id'=>3

                   ];


                   $user_id=DB::table('users')->insertGetId($user_arr);

                   $user_detail_arr=[
                        "user_id"=>$user_id,
                        "address"=>$request->address,
                        "city"=>$request->city,
                        "state"=>$request->state,
                        "zip"=>$request->zip
                        //"company"=>
                   ];
                   $user_id=DB::table('user_details')->insert($user_detail_arr);

                   $getUserTempId=getUserTempId();
                   $request->session()->put('RANK','user');
                   $request->session()->put('USER_ID',$user_id);
                   $request->session()->put('USER_NAME',$request->name);

                   $data=['name'=>$request->name,'password'=>$rand_id];
                  /* $user['to']=$request->email;
                   Mail::send('front/password_send',$data,function($messages) use ($user){
                       $messages->to($user['to']);
                       $messages->subject('New Password');
                   });*/


                      DB::table('carts')
                       ->where(['user_id'=>$getUserTempId,'user_type'=>'Not-Reg'])
                       ->update(['user_id'=>$user_id,'user_type'=>'Reg']);
               }

           }
           $coupon_value=0;
    /*       if($request->coupon_code!=''){
               $arr=apply_coupon_code($request->coupon_code);
               $arr=json_decode($arr,true);
               if($arr['status']=='success'){
                   $coupon_value=$arr['coupon_code_value'];
               }else{
                   return response()->json(['status'=>'false','msg'=>$arr['msg']]);
               }
           }
*/

           $uid=$request->session()->get('USER_ID');
           $totalPrice=0;
           $getAddToCartTotalItem=getAddToCartTotalItem();
           foreach($getAddToCartTotalItem as $list){
               $totalPrice=$totalPrice+($list->qty*$list->price);
           }
           $arr=[
               "user_id"=>$uid,
               "name"=>$request->name,
               "email"=>$request->email,
               "mobile"=>$request->mobile,
               "address"=>$request->address,
               "city"=>$request->city,
               "state"=>$request->state,
               "pincode"=>$request->zip,
               "coupon_code"=>$request->coupon_code,
               "coupon_value"=>$coupon_value,
               "payment_type"=>$request->payment_type,
               "payment_status"=>"Pending",
               "total_amt"=>$totalPrice,
               "order_status"=>1
              // "added_on"=>date('Y-m-d h:i:s')
           ];
           $order_id=DB::table('orders')->insertGetId($arr);

           if($order_id>0){
               foreach($getAddToCartTotalItem as $list){
                   $prductDetailArr['product_id']=$list->pid;
                   $prductDetailArr['order_id']=$order_id;
                   $prductDetailArr['products_attr_id']=$list->attr_id;
                   $prductDetailArr['price']=$list->price;
                   $prductDetailArr['qty']=$list->qty;
                   DB::table('order_details')->insert($prductDetailArr);
               }

               if($request->payment_type=='Gateway'){
                   $final_amt=$totalPrice-$coupon_value;
                   $ch = curl_init();
                   curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                   curl_setopt($ch, CURLOPT_HEADER, FALSE);
                   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                   curl_setopt($ch, CURLOPT_HTTPHEADER,
                       array("X-Api-Key:test_13968532adda9afcdf3e3e2d913",
                           "X-Auth-Token:test_41369cb22c12cc40c3ccb56427c"));
                   $payload = Array(
                       'purpose' => 'Buy Product',
                       'amount' => $final_amt,
                       'phone' => $request->mobile,
                       'buyer_name' =>$request->name,
                       'redirect_url' => 'http://127.0.0.1:8000/instamojo_payment_redirect',
                       'send_email' => true,
                       'send_sms' => true,
                       'email' => $request->email,
                       'allow_repeated_payments' => false
                   );
                   curl_setopt($ch, CURLOPT_POST, true);
                   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                   $response = curl_exec($ch);
                   curl_close($ch);
                   $response=json_decode($response);
                   if(isset($response->payment_request->id)){
                       $txn_id=$response->payment_request->id;
                       DB::table('orders')
                       ->where(['id'=>$order_id])
                       ->update(['txn_id'=>$txn_id]);
                       $payment_url=$response->payment_request->longurl;
                   }else{
                       $msg="";
                       foreach($response->message as $key=>$val){
                           $msg.=strtoupper($key).": ".$val[0].'<br/>';
                       }
                       return response()->json(['status'=>'error','msg'=>$msg,'payment_url'=>'']);
                   }

               }



               DB::table('carts')->where(['user_id'=>$uid,'user_type'=>'Reg'])->delete();
               $request->session()->put('ORDER_ID',$order_id);

               $status="success";
               $msg="Order placed";
           }else{
               $status="false";
               $msg="Please try after sometime";
           }
           return response()->json(['status'=>$status,'msg'=>$msg,'payment_url'=>$payment_url]);
       }



       public function order_placed(Request $request)
          {
              if($request->session()->has('ORDER_ID')){
                  return view('front.order_placed');
              }else{
                  return redirect('/');
              }
          }

          public function order_fail(Request $request)
          {
              if($request->session()->has('ORDER_ID')){
                  return view('front.order_fail');
              }else{
                  return redirect('/');
              }
          }

          public function instamojo_payment_redirect(Request $request)
          {
              if($request->get('payment_id')!==null && $request->get('payment_status')!==null && $request->get('payment_request_id')!==null){
                  if($request->get('payment_status')=='Credit'){
                      $status='Success';
                      $redirect_url='/order_placed';
                  }else{
                      $status='Fail';
                      $redirect_url='/order_fail';
                  }
                  $request->session()->put('ORDER_STATUS',$status);
                  DB::table('orders')
                      ->where(['txn_id'=>$request->get('payment_request_id')])
                      ->update(['payment_status'=>$status,'payment_id'=>$request->get('payment_id')]);
                      return redirect($redirect_url);
              }else{
                  die('Something went wrong');
              }
          }


public function orders(Request $request)
{
    $result['orders']=DB::table('orders')
    ->select('orders.*','order_status.status')
    ->leftJoin('order_status','order_status.id','=','orders.order_status')
    ->where(['orders.user_id'=>$request->session()->get('USER_ID')])
    ->get();
//chek and return cond..
    return view('front.orders',$result);
}

public function order_detail(Request $request,$id)
{
    $result['order']=DB::table('orders')
    ->select('orders.*','order_status.status as order_status')
    ->leftJoin('order_status','order_status.id','=','orders.order_status')
    ->where(['orders.id'=>$id])
    ->where(['orders.user_id'=>$request->session()->get('USER_ID')])
    ->first();
//chek and return cond..
//status column required to product status..

        $result['orders_detail']=DB::table('order_details')
        ->select('order_details.product_id','order_details.products_attr_id','order_details.price','order_details.qty',
         'products.name as pname','products.slug','product_images.img','sizes.size','colors.name as color')
        ->leftJoin('product_attributes','product_attributes.id','=','order_details.products_attr_id')
        ->leftJoin('products','products.id','=','order_details.product_id')
        ->leftJoin('product_images','product_images.product_attributes_id','=','product_attributes.id')
        ->leftJoin('sizes','sizes.id','=','product_attributes.size_id')
        ->leftJoin('colors','colors.id','=','product_attributes.color_id')
        ->where(['order_details.order_id'=>$result['order']->id])
        ->get();

        $result['users']=DB::table('users')
        ->select('users.name','users.email','users.mobile','user_details.*',)
        ->leftJoin('user_details','user_details.user_id','=','users.id')
        ->where(['users.id'=>$request->session()->get('USER_ID')])
        ->first();
  /*  
    if(!isset($result['orders_details'][0])){
        return redirect('/');
    }
*/
    //prx($result);
    return view('front.order_detail',$result);
}


public function product_attr(Request $request){
  $size = $request->size;
  $color = $request->color;
  $pid = $request->pid;

  $result['product_attr']=
      DB::table('product_attributes as attr')
      ->leftJoin('sizes','sizes.id','=','attr.size_id')
      ->leftJoin('colors','colors.id','=','attr.color_id')
      ->where(['attr.product_id'=>$pid])
      ->where(['sizes.size'=>$size])
      ->where(['colors.name'=>$color])
     ->first(['attr.id as attr_id', 'attr.price', 'attr.mrp']);


     $price = $result['product_attr']->price;
     $mrp = $result['product_attr']->mrp;
     $attr_id = $result['product_attr']->attr_id;

     $img=
     DB::table('product_images')
     ->where(['product_attributes_id'=>$result['product_attr']->attr_id])->first('img');

   return response()->json(['status'=>'success','img'=>$img, 'price'=>$price, 'attr_id'=>$attr_id, 'mrp'=>$mrp]);
}

}
