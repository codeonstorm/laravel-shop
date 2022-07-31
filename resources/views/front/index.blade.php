@extends('front.layout')
@section('page_title', 'Home')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('dist/css/custom/carousel.css')}}">
@endsection

@section('header')
  @include('front.partitions.header')
@endsection

@section('main-sidebar')
  @include('front.partitions.main-sidebar')
@endsection

@section('container')
<div class="content">
  <div class="container">
    @include('front.partitions.craousel-banner')
    <div class="row mb-5">
      <div class="col-12">
        <h4 class="text-muted letter-spacing mt-5 mb-5" style="text-align:center;">Feature Products:</h4>
      </div>
      @foreach($home_featured_product as $product)
        @php
         $attrs=$home_featured_product_attr[$product->id];
         $img=$home_featured_attr_img[$attrs->attr_id]->img;
    //     prx($attrs);
        @endphp
       <x-front.card_product :product=$product :attr=$attrs :image=$img/>
      @endforeach
    </div>

    <div class="row mb-5">
      <div class="col-12">
        <h4 class="text-muted letter-spacing mt-5 mb-5" style="text-align:center;">Tranding Products:</h4>
      </div>
      @foreach($home_tranding_product as $product)
        @php
         $attrs=$home_tranding_product_attr[$product->id];
         $img=$attrs->img;
         //prx($img);
        @endphp
       <x-front.card_product :product=$product :attr=$attrs :image=$img/>
      @endforeach
    </div>
  </div>
</div>
@endsection


@section('small_banner')
  @include('front.partitions.small_banner')
@endsection

@section('footer')
  @include('front.partitions.footer')
@endsection
