@extends('front.layout')
@section('page_title', 'Home')

@section('header')
  @include('front.partitions.header')
@endsection


@section('container')
<div class="content">
  <div class="container">
	  <div class="row">
    <div class="checkout-area col-12">
      <div class="card shadow-none">
        <div class="card-header border-0">
          @if(session()->has('FRONT_USER_LOGIN')==null)
          <input type="button" value="Login" class="btn btn-primary" value="Login"><br><br> OR <br><br>
          @endif
          <h2 class="card-title" style="letter-spacing: .1em;
          text-transform: uppercase;"><b>User Details Address</b></h2>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{url('/place_order')}}" id="frmPlaceOrder">
          <div class="card-body">
            <div class="row">
              @csrf
              <div class="col-md-8">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Name *</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="@if(isset($users->name)){{$users->name}}@endif" placeholder="Enter Name" name="name" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Email *</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" value="@if(isset($users->email)){{$users->email}}@endif" name="email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputPassword1">Mobile *</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="mobile" value="@if(isset($users->mobile)){{$users->mobile}}@endif" placeholder="Enter Mobile" required>
                  </div>
              </div>

              <div class="row">
                <div class="form-group col-12">
                  <label for="exampleInputEmail1">Address *</label>
                  <textarea type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Enter Your Address" required>@if(isset($users->name)){{$users->address}}@endif</textarea>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                  <label for="exampleInputPassword1">Town/City *</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="city" value="@if(isset($users->city)){{$users->city}}@endif" name="city" placeholder="Enter Towm/City" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputPassword1">State *</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="state" value="@if(isset($users->state)){{$users->state}}@endif" name="state" placeholder="Enter State" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="exampleInputPassword1">PosteCode/Zip *</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="zip" value="@if(isset($users->zip)){{$users->zip}}@endif" name="zip" placeholder="Ex: 201306" required>
                </div>
            </div>
          </div>

          <!--order-details-->
          <div class="col-md-4">
                <div class="checkout-right">
                  <h5 class="letter-spacing p-2">Order Summary</h5>
                  <div class="col-md-12">
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $totalPrice=0;
                        @endphp
                        @foreach($cart_data as $list)

                        @php
                        $totalPrice=$totalPrice+($list->price*$list->qty)
                        @endphp

                        <tr>
                          <td>{{$list->name}}  <strong> x  {{$list->qty}}</strong>
                          <br/>
                          {{--<span class="cart_color">{{$list->color}}</span>--}}
                          </td>
                          <td>{{$list->price*$list->qty}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                      {{--  <tr class="hide show_coupon_box">
                          <th>Coupon Code
                            <a href="javascript:void(0)" onclick="remove_coupon_code()"
                            class="remove_coupon_code_link">Remove</a></th>
                          <td id="coupon_code_str"></td>
                        </tr> --}}
                         <tr>
                          <th style="background: #bcac76; color:#fff;">Total</th>
                          <td id="total_price" style="background: #bcac76; color:#fff;"><b>INR {{$totalPrice}}</b></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                  <h5 class="letter-spacing p-2">Coupon Code</h5>
                    <div class="coupon_code form-group col-12 border p-3">
                      <input type="text" placeholder="Coupon Code" style="border-radius:0;" class="form-control" name="coupon_code" id="coupon_code">
                      <input type="button" value="Apply Coupon" style="border-radius:0;" class="form-control btn-primary" onclick="applyCouponCode()">
                      <div id="coupon_code_msg"></div>
                    </div>
                  <br>
                  <h5 class="letter-spacing p-2">Payment Method</h5>
                  <div class="payment-mode form-group col-12 border p-3">
                    <label for="cod">
                      <input type="radio" id="cod"  name="payment_type" value="COD" checked="">
                       Cash on Delivery
                     </label><br>
                    <label for="instamojo">
                    <input type="radio" id="instamojo" name="payment_type" value="Gateway"> Via Instamojo </label>

                    <input type="submit" value="Place Order" style="border-radius:0;" class="form-control btn-primary" id="btnPlaceOrder">
                  </div>

                  <div id="order_place_msg"></div>
                </div>
              </div>
          </div>
          </div>
          <!-- /.card-body -->
        </form>
      </div>
    </div>

    </div>
  </div>
</div>
@endsection


@section('footer')
  @include('front.partitions.footer')
@endsection
