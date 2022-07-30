<?php
use Illuminate\Support\Facades\DB;

function prx($arr){
  echo "<pre>";
  print_r($arr);
  die;
}

function getTopNavCat(){
    $result=DB::table('categories')
            ->where(['status'=>1])
            ->get();
            $arr=[];
    foreach($result as $row){
        $arr[$row->id]['name']=$row->name;
        $arr[$row->id]['parent_id']=$row->parent_id;
		$arr[$row->id]['slug']=$row->slug;
    // echo "<pre>";
    // print_r($arr);

    }
    $str=buildTreeView($arr,0);
    return $str;
}

$html='';
function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){

			if($level>$prelevel){
				if($html==''){
					// $html.='<ul class="nav navbar-nav">';
				}else{
					$html.='<ul class="dropdown-menu">';
				}

			}
			if($level==$prelevel){
				$html.='</li>';
			}
			$url=url("/category/".$data['slug']);

          $html.='<li class="nav-item dropdown dropdown-hover"><a  href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link ">'.$data['name'].'</a>';


      if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}


function getUserTempId(){
	if(!session()->has('USER_ID')){
  	if(!session()->has('USER_TEMP_ID')){
      $rand=rand(111111111,999999999);
  		session()->put('USER_TEMP_ID',$rand);
  		return $rand;
    }else{
  		return session()->get('USER_TEMP_ID');
  	}
	}
}



function getAddToCartTotalItem(){
	if(session()->has('USER_ID')){
		$uid=session()->get('USER_ID');
		$user_type="Reg";
	}else{
		$uid=getUserTempId();
		$user_type="Not-Reg";
	}
	$result=DB::table('carts')
        ->leftJoin('product_attributes','product_attributes.id','=','carts.product_attr_id')
        ->leftJoin('products','products.id','=','product_attributes.product_id')
        ->leftJoin('sizes','sizes.id','=','product_attributes.size_id')
        ->leftJoin('colors','colors.id','=','product_attributes.color_id')
        ->where(['user_id'=>$uid])
        ->where(['user_type'=>$user_type])
        ->select('carts.qty','products.name', 'products.short_desc','sizes.size','colors.name as color','product_attributes.price','products.slug','products.id as pid','product_attributes.id as attr_id')
        ->get();

	return $result;

}

function getCustomDate($date){
	if($date!=''){
		$date=strtotime($date);
		return date('d-M Y',$date);
	}
}

function getAvaliableQty($attr_id){
	$result=DB::table('order_details')
          // ->leftJoin('orders','orders.id','=','order_details.orders_id')
		//	->leftJoin('product_attributes.id'=>$attr_id))
        //    ->where(['orders_details.product_id'=>$product_id])
            ->where(['order_details.products_attr_id'=>$attr_id])
            ->select('order_details.qty as qty')
            ->get();
  	$result=DB::table('product_attributes')->where(['id'=>$attr_id])->find();
            prx($result);
	return $result;
}
 ?>
