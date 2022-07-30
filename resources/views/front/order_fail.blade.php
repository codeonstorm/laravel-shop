@extends('front.layout')
@section('page_title', 'Home')

@section('header')
@include('front.partitions.header-without-category')
@endsection


@section('container')
<section id="aa-product-category">
   <div class="container">
      <div class="row" style="text-align:center;">
        <br/><br/><br/>
            <h2>Your order has been failed</h2>
        <br/><br/><br/>
      </div>
   </div>
</section>
@endsection


@section('footer')
  @include('front.partitions.footer')
@endsection
