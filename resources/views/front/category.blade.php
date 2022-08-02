@extends('front.layout')
@section('page_title', 'Category')
<style>
.color_active{
  border: 2px solid #bcac76!important;
}
</style>
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
<div class="col-md-3 dex-filter">
  <nav class="mt-3">
 
    <h4>Categories</h4>

            <ul class="nav nav-pills nav-sidebar flex-column" ><!-- data-widget="treeview" role="menu" data-accordion="false" add this to toogle -->
              <li class="nav-item has-treeview menu-open">
              <a href="{{url('category/'.$product[0]->cat_slug)}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    {{$product[0]->category}}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: block; height: 89.5573px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
                  @foreach($categories_left as $cat)
                  <li class="nav-item">
                    <a href="{{url('category/'.$cat->slug)}}" class="nav-link">

                      <p class="item">{{$cat->name}}</p>
                    </a>
                  </li>             
                  @endforeach
                </ul>
              </li>
            </ul>
 
            <!--<div class="sidebar-block px-3 px-lg-0 mt-2">
              <div class="expand-lg"><h5 class="sidebar-heading d-none d-lg-block">Brand</h5>
                <form class="mt-4 mt-lg-0"><div class="mb-1">

                  <div class="form-group">
                    <div class="custom-control custom-checkbox mb-1">
                      <input class="custom-control-input" type="checkbox" id="brand" name="brand" value="google">
                      <label for="brand" class="custom-control-label">Ceom Checkbox </label>
                      <small>(  --><!--  )</small></label>
                    </div>
                  </div>

                   </form>
                 </div>
               </div>-->
                                <!-- brand//-->

              <!-- price filter-->
              <!-- size -->
              <div class="sidebar-block px-3 px-lg-0">
                <div class="expand-lg">
                  <h5 class="sidebar-heading d-none d-lg-block">Price filter</h5>
                  <form class="mt-4 mt-lg-0">
                    <div class="mb-1">
                      <div class="form-group">
                        <input id="min-range" class="" type="range">

                        <input id="max-range" class="" type="range">

                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              <!--price-filter//-->

              @if($sizes_left)
               <!-- size -->
               <div class="sidebar-block px-3 px-lg-0">
                 <div class="expand-lg">
                   <h5 class="sidebar-heading d-none d-lg-block">Size</h5>
                   <form class="mt-4 mt-lg-0">
                   @foreach($sizes_left as $size)
                   <div class="form-group">
                    <div class="custom-control custom-checkbox mb-1">
                    @if(in_array($size->id,$sizeFilterArr))
                      <input class="custom-control-input" type="checkbox" id="size_{{$size->size}}" name="size" value="{{$size->id}}" checked>
                    @else
                      <input class="custom-control-input" type="checkbox" id="size_{{$size->size}}" name="size" value="{{$size->id}}">
                    @endif
                      <label for="size_{{$size->size}}" class="custom-control-label">{{$size->size}} </label>
                    </div>
                  </div>
                    @endforeach
                    </form>
                  </div>
                </div>
              <!--size//-->
              @endif

               @if($colors)
               <!--color-->             
               <div class="sidebar-block px-3 px-lg-0">

                 <div class="expand-lg">
                   <h5 class="sidebar-heading d-none d-lg-block">Colour</h5>
                   <ul id="colors_box" class="list-inline mb-0 colours-wrapper mt-4 mt-lg-0">
                    @foreach($colors as $key=>$color)                  
                     <li class="list-inline-item">
                     @if(in_array($color['id'],$colorFilterArr))
                       <label class="btn-colour  form-label color_active" id="color_{{$key}}" for="{{$key}}" style="background-color:{{$color['code']}}">
                      @else 
                     <label class="btn-colour  form-label" id="color_{{$key}}" for="{{$key}}" style="background-color:{{$color['code']}}">
                     @endif
                       </label><div class="input-invisible">
                         <input type="checkbox" name="color" id="{{$key}}" class="form-group-input" value="{{$color['id']}}">
                       </div>
                     </li>
                     @endforeach
                   </ul>
                   </div>
                  </div>
               <!--color//-->
               @endif
          </nav>

        <!-- /.card -->
      </div>
<!-- /.col-md-6 -->
<div class="col-lg-9">
  <section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b> Top Results </b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item actives">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2">

          <div class="col-6">
          <center class="popup-filter">
              <a href='#sort' data-toggle='modal'>
                <button type="button" class="filter btn" style="background-color:#bcac76; color:#fff;">SORT</button>
              </a>
          </center>
          </div>
          <div class="col-6">
            <center class="popup-filter">
              <a href='#filter' data-toggle='modal'>
                <button type="button" class="filter btn" style="background-color:#bcac76; color:#fff;">FILTER</button>
              </a>
            </center>
          </div>



        </div><!-- /.row -->



      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="container-fluid">
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
</div>
</div></section>
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div>

</div>
</div>

<form id="categoryFilter">
  @if($colors)<input type="hidden" id="price_sort" name="price_sort" value="asc">@endif
  @if($colors)<input type="hidden" id="color_filter" name="color_filter" value="{{$color_filter}}">@endif
  @if($sizes_left)<input type="hidden" id="brand_filter" name="brand_filter" value="">@endif
  @if($sizes_left)<input type="hidden" id="size_filter" name="size_filter" value="{{$size_filter}}">@endif
</form>
@endsection
<script>

</script>

@section('footer')
  @include('front.partitions.footer')
@endsection
<script>
 /*

 alert(num);

function setColfor(e){
//console.log(e.type);
  var color_str=jQuery('#color_filter').val();
 /* if(type==1){
    var new_color_str=color_str.replace(color+':','');
    jQuery('#color_filter').val(new_color_str);
  }else{
    jQuery('#color_filter').val(color+':'+color_str);
    jQuery('#categoryFilter').submit();
  }
 
  jQuery('#categoryFilter').submit();*//*
}
function sort_by(){
  var sort_by_value=jQuery('#sort_by_value').val();
  jQuery('#sort').val(sort_by_value);
  jQuery('#categoryFilter').submit();
}

function sort_price_filter(){
  jQuery('#filter_price_start').val(jQuery('#skip-value-lower').html());
  jQuery('#filter_price_end').val(jQuery('#skip-value-upper').html());
  jQuery('#categoryFilter').submit(); 
}*/

</script>