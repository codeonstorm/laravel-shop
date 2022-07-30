@extends('front.layout')
@section('page_title', 'Home')

@section('header')
  @include('front.partitions.header')
@endsection

@section('main-sidebar')
  @include('front.partitions.main-sidebar')
@endsection
@php 
getAddToCartTotalItem();
@endphp
@section('container')
<div class="content">
  <div class="container">
	<div class="row">

  	<div class="col-md-9">
  	@foreach($list as $list)
    <!-- card -->
  	 <div class="card" style="box-shadow: none;">
  		<div class="card-body">
  			<div class="d-flex align-items-center row">
      		<div class="col-md-5 col-12">
  				<a href="/tops-blouses/white-tee">
      			<div class="d-flex align-items-center">

  							<img style="display: block; max-width: 28%; width: initial; height: initial;
  							background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; opacity: 1;
  								border: 0px none; margin: 0px; padding: 0px;" alt="" aria-hidden="true" src="{{asset('storage/media/product/'.$list_img[$list->attr_id]->img)}}">

  					<div class="text-start" style="padding-left: 15%;">
  							<strong>{{$list->name}}</strong><br><span class="text-muted text-sm">
  								{{$list->short_desc}}</span><br><span class="text-muted text-sm">Colour: Green
  								</span>
  					</div>
  						</div>
  					</a>
  		</div>

  					<div class="mt-4 mt-md-0 col-md-7 col-12">
  									<div class="align-items-center  row"><div class="col-md-3">
  										<div class="row"><div class="d-md-none text-muted col-6">Price per item</div>
  										<div class="text-end text-md-center col-md-12 col-6">$ {{$list->price}}</div></div></div>

  										<div class="col-md-4">
  											<div class="align-items-center row">
  											<div class="text-muted d-md-none col-sm-9 col-7">Quantity</div>
  											<div class="col-md-12 col-sm-3 col-5">
  												<div class="d-flex align-items-center">
  													<button type="button" class="items-decrease btn btn-items" onclick="decrement()">-</button>
  													<input type="number" class="text-center border-0 border-md input-items form-control" value="{{$list->qty}}" onchange="update({{$list->attr_id}})">
  													<button type="button" class="items-increase btn btn-items" onclick="increment()">+</button>
  												</div>
  											</div>
  											</div>
  											</div>
  													<div class="col-md-3">
  														<div class="row">
  														<div class="d-md-none text-muted col-6">Total price</div>
  														<div class="text-end text-md-center col-md-12 col-6">$ {{$list->price * $list->qty}}</div>
  													</div>
  												</div>
  													<div class="d-none d-md-block text-center col-2">
  													<button type="button" class="btn btn-tool remove" data-card-widget="remove" onclick="remove({{$list->attr_id}})"><i class="fas fa-times"></i></button>
  												</div>
  													</div></div></div>
  		</div>

  		<!-- /.card-body -->
  	</div>
  	<!-- /.card -->
  	@endforeach
    <div class="d-flex justify-content-between flex-column flex-lg-row mb-5 mb-lg-0">
      <a role="button" tabindex="0" href="/category-full" class="text-muted btn btn-link">
        Continue Shopping
      </a>
      <a role="button" tabindex="0" href="#" class="text-primary btn btn-link">
        <i class="fas fa-sync-alt"></i>
        Update cart
    </a>
    </div>
  	</div>



				<div class="col-md-3">

						<!-- Profile Image -->
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
								<i class="fas fa-cart-plus fa-lg mr-2 profile-user-img img-fluid img-circle"></i>
								</div>

								<h3 class="profile-username text-center">Cart</h3>

								<p class="text-muted text-center">hurry up!..</p>
								@php
								$getAddToCartTotalItem=getAddToCartTotalItem();
								$totalCartItem=count($getAddToCartTotalItem);
								$totalPrice=0;
								@endphp
								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item">
										<b>Total Items</b> <a class="float-right">{{$totalCartItem}}</a>
									</li>
									@foreach($getAddToCartTotalItem as $cartItem)
										@php
										$totalPrice=$totalPrice+($cartItem->qty*$cartItem->price)
										@endphp
									
										{{--{{$cartItem->name}} 
										{{$cartItem->qty}} * Rs {{$cartItem->price}} --}}
									@endforeach
									<li class="list-group-item">
										<b>Price</b> <a class="float-right">{{$totalPrice}}</a>
									</li>
									<li class="list-group-item">
										<b>Shipping and handling</b> <a class="float-right">287</a>
									</li>
									<li class="list-group-item">
										<b>Tax/GST</b> <a class="float-right">200</a>
									</li>
									<li class="list-group-item">
										<b>Total Price</b> <a class="float-right">11,287</a>
									</li>
								</ul>

								<a href="{{url('checkout')}}" class="btn btn-primary btn-block"><b>CHECKOUT</b></a>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->


					</div>
					</div>
	</div>
	@csrf
	</div>
@endsection


<script>

function remove(attr_id){
	jQuery.ajax({
      type:'post',
      url:'/add_to_cart',
      data:'product_attr_id='+attr_id+'&pqty='+0+'&_token='+jQuery("[name='_token']").val(),
      success:function(result){
        alert('your product '+result.msg+' from cart!');

      }
    });
}

function update(attr_id){
	var num = jQuery("[type='number']").val();
	jQuery.ajax({
      type:'post',
      url:'/add_to_cart',
      data:'product_attr_id='+attr_id+'&pqty='+num+'&_token='+jQuery("[name='_token']").val(),
      success:function(result){
        alert('your product '+result.msg+' from cart!');
alert(attr_id);
	  }
	});
}


function increment(){
	var num = jQuery("[type='number']");
	num.val(int(num.val())+1);
}

function decrement(){
	var num = jQuery("[type='number']").val()
	alert(num);
}
 
</script>


@section('footer')
  @include('front.partitions.footer')
@endsection
