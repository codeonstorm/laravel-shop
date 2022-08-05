@extends('front.layout')
@section('page_title', 'Category')
<style>
.color_active{
  border: 2px solid #bcac76!important;
}
/**********************/
/*price filter*/
/*********************/
.widget_price_filter .ui-slider {
position:relative;
text-align:left;
margin-left:.5em;
margin-right:.5em
}
 .widget_price_filter .ui-slider .ui-slider-handle {
position:absolute;
z-index:2;
width:1em;
height:1em;
background-color:#a46497;
border-radius:1em;
cursor:ew-resize;
outline:0;
top:-.3em;
margin-left:-.5em
}
 .widget_price_filter .ui-slider .ui-slider-range {
position:absolute;
z-index:1;
font-size:.7em;
display:block;
border:0;
border-radius:1em;
background-color:#a46497
}

 .widget_price_filter .ui-slider-horizontal {
height:.5em
}
 .widget_price_filter .ui-slider-horizontal .ui-slider-range {
top:0;
height:100%
}





/******************************* */

/* Ion.RangeSlider
// css version 2.0.3
// Â© 2013-2014 Denis Ineshin | IonDen.com
// ===================================================================================================================*/

/* =====================================================================================================================
// RangeSlider */

.irs {
    position: relative; display: block;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
     -khtml-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
}
    .irs-line {
        position: relative; display: block;
        overflow: hidden;
        outline: none !important;
    }
        .irs-line-left, .irs-line-mid, .irs-line-right {
            position: absolute; display: block;
            top: 0;
        }
        .irs-line-left {
            left: 0; width: 11%;
        }
        .irs-line-mid {
            left: 9%; width: 82%;
        }
        .irs-line-right {
            right: 0; width: 11%;
        }

    .irs-bar {
        position: absolute; display: block;
        left: 0; width: 0;
    }
        .irs-bar-edge {
            position: absolute; display: block;
            top: 0; left: 0;
        }

    .irs-shadow {
        position: absolute; display: none;
        left: 0; width: 0;
    }

    .irs-slider {
        position: absolute; display: block;
        cursor: default;
        z-index: 1;
    }
        .irs-slider.single {

        }
        .irs-slider.from {

        }
        .irs-slider.to {

        }
        .irs-slider.type_last {
            z-index: 2;
        }

    .irs-min {
        position: absolute; display: block;
        left: 0;
        cursor: default;
    }
    .irs-max {
        position: absolute; display: block;
        right: 0;
        cursor: default;
    }

    .irs-from, .irs-to, .irs-single {
        position: absolute; display: block;
        top: 0; left: 0;
        cursor: default;
        white-space: nowrap;
    }

.irs-grid {
    position: absolute; display: none;
    bottom: 0; left: 0;
    width: 100%; height: 20px;
}
.irs-with-grid .irs-grid {
    display: block;
}
    .irs-grid-pol {
        position: absolute;
        top: 0; left: 0;
        width: 1px; height: 8px;
        background: #000;
    }
    .irs-grid-pol.small {
        height: 4px;
    }
    .irs-grid-text {
        position: absolute;
        bottom: 0; left: 0;
        white-space: nowrap;
        text-align: center;
        font-size: 9px; line-height: 9px;
        padding: 0 3px;
        color: #000;
    }

.irs-disable-mask {
    position: absolute; display: block;
    top: 0; left: -1%;
    width: 102%; height: 100%;
    cursor: default;
    background: rgba(0,0,0,0.0);
    z-index: 2;
}
.lt-ie9 .irs-disable-mask {
    background: #000;
    filter: alpha(opacity=0);
    cursor: not-allowed;
}

.irs-disabled {
    opacity: 0.4;
}


.irs-hidden-input {
    position: absolute !important;
    display: block !important;
    top: 0 !important;
    left: 0 !important;
    width: 0 !important;
    height: 0 !important;
    font-size: 0 !important;
    line-height: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    outline: none !important;
    z-index: -9999 !important;
    background: none !important;
    border-style: solid !important;
    border-color: transparent !important;
}


/* Ion.RangeSlider, Simple Skin
// css version 2.0.3
// Â© Denis Ineshin, 2014    https://github.com/IonDen
// Â© guybowden, 2014        https://github.com/guybowden
// ===================================================================================================================*/

/* =====================================================================================================================
// Skin details */

.irs {
    height: 55px;
}
.irs-with-grid {
    height: 75px;
}
.irs-line {
    height: 10px; top: 33px;
    background: #EEE;
    background: linear-gradient(to bottom, #DDD -50%, #FFF 150%); /* W3C */
    border: 1px solid #CCC;
    border-radius: 16px;
    -moz-border-radius: 16px;
}
    .irs-line-left {
        height: 8px;
    }
    .irs-line-mid {
        height: 8px;
    }
    .irs-line-right {
        height: 8px;
    }

.irs-bar {
    height: 10px; top: 33px;
    border-top: 1px solid #428bca;
    border-bottom: 1px solid #428bca;
    background: #428bca;
    background: linear-gradient(to top, rgba(66,139,202,1) 0%,rgba(127,195,232,1) 100%); /* W3C */
}
    .irs-bar-edge {
        height: 10px; top: 33px;
        width: 14px;
        border: 1px solid #428bca;
        border-right: 0;
        background: #428bca;
        background: linear-gradient(to top, rgba(66,139,202,1) 0%,rgba(127,195,232,1) 100%); /* W3C */
        border-radius: 16px 0 0 16px;
        -moz-border-radius: 16px 0 0 16px;
    }

.irs-shadow {
    height: 2px; top: 38px;
    background: #000;
    opacity: 0.3;
    border-radius: 5px;
    -moz-border-radius: 5px;
}
.lt-ie9 .irs-shadow {
    filter: alpha(opacity=30);
}

.irs-slider {
    top: 25px;
    width: 27px; height: 27px;
    border: 1px solid #AAA;
    background: #DDD;
    background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(220,220,220,1) 20%,rgba(255,255,255,1) 100%); /* W3C */
    border-radius: 27px;
    -moz-border-radius: 27px;
    box-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    cursor: pointer;
}

.irs-slider.state_hover, .irs-slider:hover {
    background: #FFF;
}

.irs-min, .irs-max {
    color: #333;
    font-size: 12px; line-height: 1.333;
    text-shadow: none;
    top: 0;
    padding: 1px 5px;
    background: rgba(0,0,0,0.1);
    border-radius: 3px;
    -moz-border-radius: 3px;
}

.lt-ie9 .irs-min, .lt-ie9 .irs-max {
    background: #ccc;
}

.irs-from, .irs-to, .irs-single {
    color: #fff;
    font-size: 14px; line-height: 1.333;
    text-shadow: none;
    padding: 1px 5px;
    background: #428bca;
    border-radius: 3px;
    -moz-border-radius: 3px;
}
.lt-ie9 .irs-from, .lt-ie9 .irs-to, .lt-ie9 .irs-single {
    background: #999;
}

.irs-grid {
    height: 27px;
}
.irs-grid-pol {
    opacity: 0.5;
    background: #428bca;
}
.irs-grid-pol.small {
    background: #999;
}

.irs-grid-text {
    bottom: 5px;
    color: #99a4ac;
}

.irs-disabled {
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

              <!-- price filter 
 

              <div id="" class="widget_price_filter">
	 <div class="big-store-widget-content">

<div class="price_slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" style="">
 <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;">
 </div>

	 <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
	 <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
</div>
</div>
</div>

 -- code price filter new-->
 
 <form>
 <div class="range-slider">
      <input type="text" class="js-range-slider" value="" />
  </div>
  <hr>
  <div class="extra-controls form-inline">
    <div class="form-group">
      <input type="text" class="js-input-from form-control" name="filter_price_start" value="{{$filter_price_start}}" />
      <input type="text" class="js-input-to form-control" name="filter_price_end" value="{{$filter_price_start}}" />
    </div>
    <input type="submit" value="filter">
  </div>
 </form>

 
 

 

<!------------------------------>

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