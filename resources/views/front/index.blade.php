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
    @include('front.partitions.products')
  </div>
</div>
@endsection


@section('small_banner')
  @include('front.partitions.small_banner')
@endsection

@section('footer')
  @include('front.partitions.footer')
@endsection
