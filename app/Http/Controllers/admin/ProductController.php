<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Storage;

class ProductController extends Controller
{
  public function index()
  {
      $result['data']=Product::Paginate(5);
      return view('admin/product',$result);
  }


  public function manage_product(Request $request,$slug='')
  {
      if($slug!=''){
         $arr=Product::where(['slug'=>$slug])->get();
         if(empty($arr[0])){
           $request->session()->flash('message','Product not exists');
           return redirect('admin/Product');
         }

            $result['category_id']=$arr['0']->cat_id;
            $result['name']=$arr['0']->name;
            $result['slug']=$arr['0']->slug;
            $result['brand']=$arr['0']->brand;
          //  $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
          //  $result['uses']=$arr['0']->uses;
          //  $result['warranty']=$arr['0']->warranty;
          //  $result['lead_time']=$arr['0']->lead_time;
          //  $result['tax_id']=$arr['0']->tax_id;
          //  $result['is_promo']=$arr['0']->is_promo;
            $result['is_featured']=$arr['0']->is_featured;
          //  $result['is_discounted']=$arr['0']->is_discounted;
            $result['is_tranding']=$arr['0']->is_tranding;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
            $result['is_edit']=1;

           $result['productAttrArr']=ProductAttribute::where(['product_id'=>$result['id']])->get();
          // $productImagesArr=ProductImage::where(['product_id'=>$result['id']])->get();

      /*     if(!isset($productImagesArr[0])){
               $result['productImagesArr']['0']['id']='';
               $result['productImagesArr']['0']['images']='';
           }else{
               $result['productImagesArr']=$productImagesArr;
           }*/

      }else{
        $result['category_id']='';
        $result['name']='';
        $result['slug']='';
        $result['brand']='';
      //  $result['model']='';
        $result['short_desc']='';
        $result['desc']='';
        $result['keywords']='';
      //  $result['uses']='';
      //  $result['warranty']='';
      //  $result['lead_time']='';
      //  $result['tax_id']='';
      //  $result['is_promo']='';
        $result['is_featured']='';
      //  $result['is_discounted']='';
        $result['is_tranding']='';
        $result['status']='';
        $result['id']=0;

        $result['productAttrArr'][0]['id']='';
        $result['productAttrArr'][0]['products_id']='';
        $result['productAttrArr'][0]['sku']='';
        $result['productAttrArr'][0]['mrp']='';
        $result['productAttrArr'][0]['price']='';
        $result['productAttrArr'][0]['qty']='';
        $result['productAttrArr'][0]['size_id']='';
        $result['productAttrArr'][0]['color_id']='';

        $result['productImagesArr']['0']['id']='';
        $result['productImagesArr']['0']['img']='';
        $result['is_edit']=0;
      }

          $result['categories']=DB::table('categories')->where(['status'=>1])->get();

          $result['sizes']=DB::table('sizes')->where(['status'=>1])->get();

          $result['colors']=DB::table('colors')->where(['status'=>1])->get();

          $result['brands']=DB::table('brands')->where(['status'=>1])->get();

        //  $result['taxs']=DB::table('taxs')->where(['status'=>1])->get();
          return view('admin/manage_product',$result);
  }

  public function manage_product_process(Request $request)
  {
    //  return $request->file( );
  /*  echo "<pre>";
     print_r($request->file("attr_image.$key"));
     die;*/

     if($request->add) $request->flash();
      $request->validate([
        'name'=>'required',
        'category'=>'required',
        'is_featured'=>'required',
        'is_tranding'=>'required',
        'short_desc'=>'required',
        'desc'=>'required',
        'keywords'=>'required',
        'slug'=>'required|unique:products,slug,'.$request->post('id'),
        'sku'=>'required',
        //'attr_image.*' =>'required|mimes:jpg,jpeg,png',
      ]);

      if($request->has('update') && $request->post('id')>0){
        $model=Product::find($request->post('id'));
        if(empty($model)){
          $request->session()->flash('message','something goes rong!');
          return redirect('admin/category/manage_category/');
        }
            $msg="Product updated";
      }else{
          $model=new Product();
        //  $request->validate(['image'=>'required']);
          $msg="Product inserted";
      }

        $model->cat_id=$request->post('category');;
        $model->name=$request->post('name');
        $model->slug=$request->post('slug');
        //$model->brand=$request->post('brand');
      //  $model->model=$request->post('model');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keywords=$request->post('keywords');
      //  $model->technical_specification=$request->post('technical_specification');
      //  $model->uses=$request->post('uses');
      //  $model->warranty=$request->post('warranty');
      //  $model->lead_time=$request->post('lead_time');
      //  $model->tax_id=$request->post('tax_id');
      //  $model->is_promo=$request->post('is_promo');
        $model->is_featured=$request->post('is_featured');
      //  $model->is_discounted=$request->post('is_discounted');
        $model->is_tranding=$request->post('is_tranding');
        $model->status=1;
      $model->save();
      $pid=$model->id;

      /*Product Attr Start*/
     $paidArr=$request->post('paid');
     $skuArr=$request->post('sku');
     $mrpArr=$request->post('mrp');
     $priceArr=$request->post('price');
     $qtyArr=$request->post('qty');
     $size_idArr=$request->post('size_id');
     $color_idArr=$request->post('color_id');

     foreach($skuArr as $key=>$val){
         $check=ProductAttribute::where('sku','=',$skuArr[$key])->
         where('id','!=',$paidArr[$key])->
         get();

         if(isset($check[0])){
             $request->session()->flash('sku_error',$skuArr[$key].' SKU already used');
             return redirect(request()->headers->get('referer'));
         }
     }

     /*insert and update attr*/
      foreach($skuArr as $key=>$val){
          $productAttrArr=[];
          $productAttrArr['product_id']=$pid;
          $productAttrArr['sku']=$skuArr[$key];
          $productAttrArr['mrp']=(int)$mrpArr[$key];
          $productAttrArr['price']=(int)$priceArr[$key];
          $productAttrArr['qty']=(int)$qtyArr[$key];
          if($size_idArr[$key]==''){
              $productAttrArr['size_id']=0;
          }else{
              $productAttrArr['size_id']=$size_idArr[$key];
          }

          if($color_idArr[$key]==''){
              $productAttrArr['color_id']=0;
          }else{
              $productAttrArr['color_id']=$color_idArr[$key];
          }

          $image_name=""; // to store product attribute image name globaly
          if($request->hasFile("attr_image.$key")){
           if($paidArr[$key]!=''){
                $arrImage=ProductImage::where('product_attributes_id','=',$paidArr[$key])->first();

                if(isset($arrImage[0])){
                  if(Storage::exists('/public/media/product/'.$arrImage[0]->img)){
                      Storage::delete('/public/media/product/'.$arrImage[0]->img);
                }
              }
              }

              $rand=rand('111111111','999999999');
              $attr_image=$request->file("attr_image.$key");
              $ext=$attr_image->extension();
              $image_name=$rand.'.'.$ext;
              $request->file("attr_image.$key")->storeAs('/public/media/product',$image_name);
          }

          if($paidArr[$key]!=''){
              $updateAttrId = DB::table('product_attributes')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
              if(isset($image_name))
                $productAttrImag = ProductImage::where('product_attributes_id', $paidArr[$key])->update(['img'=>$image_name]);
          }else{
              $attr_insert_id = DB::table('product_attributes')->insertGetId($productAttrArr);
              $productAttrImag = new ProductImage();
              $productAttrImag->product_attributes_id = $attr_insert_id;
              $productAttrImag->img = $image_name;
              $productAttrImag->save();
          }

      }

      /*Product Attr End*/

      $request->session()->flash('message',$msg);
      return redirect('admin/product');

  }

  public function delete(Request $request,$slug){

           $result['product']=
            DB::table('products')
            ->where(['status'=>1])
            ->where(['slug'=>$slug])
            ->first('id');


            if(!isset($result['product'])){
              $request->session()->flash('message','product does\'nt exits');
              return redirect('admin/products');
            }

            $result['product_attr']=
                DB::table('product_attributes as pAttr')
                ->where(['pAttr.product_id'=>$result['product']->id])
                ->get('id');

          foreach($result['product_attr'] as $attrlist){

            $result['images']=
            DB::table('product_images')
            ->where(['product_attributes_id'=>$attrlist->id])
            ->get('id');

              ProductAttribute::find($attrlist->id)->delete();
            foreach ($result['images']as $img) {
              ProductImage::find($img->id)->delete();
            }
          }

      Product::find($result['product']->id)->delete();

      $request->session()->flash('message','product deleted');
      return redirect('admin/product');
  }

  public function status(Request $request,$status,$slug){
      $check = Product::where('slug', $slug);
      if($check->doesntExist()){
        $request->session()->flash('message','product does\'nt exits');
        return redirect('admin/product');
      }
      $model=Product::find($check->value('id'));

      $model->status=$status;
      $model->save();
      $request->session()->flash('message','product status updated');
      return redirect('admin/product');
  }
}
