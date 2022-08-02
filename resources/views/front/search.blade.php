@extends('front.layout')
@section('page_title', 'Category')
 
@section('header')
  @include('front.partitions.header')
@endsection

@section('main-sidebar')
  @include('front.partitions.main-sidebar')
@endsection

@section('container')

<div class="content">
<div class="container">
<div class="row">
<!--product-->

@if(isset($product[0]))

  @foreach($product as $product)
    @php
     $attrs=$product_attributes[$product->id][0];
     $img=$attrs->img;
  //  prx($img);
    @endphp
   <x-front.card_product :product=$product :attr=$attrs :image=$img/>
  @endforeach

 @else
 <h1>data not found</h1>
 @endif
<!-- /.row -->
</div>
</div>
</div>
@endsection

@section('footer')
  @include('front.partitions.footer')
@endsection
