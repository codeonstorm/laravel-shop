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

$html='';/*
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
			$url=url("category/".$data['slug']);

          $html.='<li class="nav-item dropdown dropdown-hover text-dark letter-spacing"    ><a style="white-space: nowrap;"   class="" href='.$url.'">'.$data['name'].'</a><span class="dropdown-toggle pl-2 pr-2" style="float:right"></span>';


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
*/

function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){

			if($level>$prelevel){
        if($level>0){
					$html.='<ul class="nav nav-treeview" '.$level.' style="display: none;" '.$prelevel.'>';
        }
			}

			if($level==$prelevel){
				$html.='</li>';
			}
			$url=url("category/".$data['slug']);


           $html.='<li class="nav-item has-treeview">
                     <a href="'.$url.'" class="nav-link">
                       <p>'.$data['name'].'
                        <i class="right fas fa-angle-left"></i>
                       </p>
                     </a>';





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
        ->select('carts.id as cart_id','carts.qty','products.name', 'products.short_desc','sizes.size','colors.name as color','product_attributes.price','products.slug','products.id as pid','product_attributes.id as attr_id')
        ->get();

        foreach ($result as $value) {
          //if price is 0 or product is deleted
          if(!$value->price){
            echo "<div style='color:red;'>".$value->name." has been removed from your cart because it can no longer be purchased. Please contact us if you need assistance.</div>";
            DB::table('carts')->where(['id'=>$value->cart_id])->delete();

          }
        }
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
            //prx($result);
	return $result;
}
 ?>
