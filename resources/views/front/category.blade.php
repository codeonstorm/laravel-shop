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
<div class="col-md-3 dex-filter">
  <nav class="mt-3">
    <h4>Categories</h4>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Trousers
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="height: 89.5573px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px; display: none;">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p class="item">Active Page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p class="item">Inactive Page</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Jackets
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: block; height: 89.5573px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
                  <li class="nav-item">
                    <a href="#" class="nav-link">

                      <p class="item">Active Page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">

                      <p class="item">Inactive Page</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>

            <div class="sidebar-block px-3 px-lg-0 mt-2">
              <div class="expand-lg"><h5 class="sidebar-heading d-none d-lg-block">Brand</h5>
                <form class="mt-4 mt-lg-0"><div class="mb-1">

                  <div class="form-group">
                    <div class="custom-control custom-checkbox mb-1">
                      <input class="custom-control-input" type="checkbox" id="clothes-brand" name="clothes-brand">
                      <label for="clothes-brand" class="custom-control-label">Ceom Checkbox checked</label>
                      <small>(<!-- -->18<!-- -->)</small></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox mb-1">
                      <input class="custom-control-input" type="checkbox" id="clothes-brand" name="clothes-brand">
                      <label for="clothes-brand" class="custom-control-label">Custom Checkbox</label>
                      <small>(<!-- -->18<!-- -->)</small></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox mb-1">
                      <input class="custom-control-input" type="checkbox" id="clothes-brand" name="clothes-brand">
                      <label for="clothes-brand" class="custom-control-label">Checkbox checked</label>
                      <small>(<!-- -->18<!-- -->)</small></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox mb-1">
                      <input class="custom-control-input" type="checkbox" id="clothes-brand" name="clothes-brand">
                      <label for="clothes-brand" class="custom-control-label">Custom Checkbox</label>
                      <small>(<!-- -->18<!-- -->)</small></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox mb-1">
                      <input class="custom-control-input" type="checkbox" id="clothes-brand" name="clothes-brand">
                      <label for="clothes-brand" class="custom-control-label">Custom checked</label>
                      <small>(<!-- -->18<!-- -->)</small></label>
                    </div>
                  </div>

                   </form>
                 </div>
               </div>
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

               <!-- size -->
               <div class="sidebar-block px-3 px-lg-0">
                 <div class="expand-lg">
                   <h5 class="sidebar-heading d-none d-lg-block">Size</h5>
                   <form class="mt-4 mt-lg-0">
                     <div class="mb-1">
                       <div class="custom-control custom-radio">
                         <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                         <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                       </div>
                     </div>
                     <div class="mb-1">
                       <div class="custom-control custom-radio">
                         <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                         <label for="customRadio2" class="custom-control-label">Custom Radio</label>
                       </div>
                     </div>

                     <div class="mb-1">
                       <div class="custom-control custom-radio">
                         <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                         <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                       </div>
                     </div>

                     <div class="mb-1">
                       <div class="custom-control custom-radio">
                         <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                         <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                       </div>
                     </div>

                     <div class="mb-1">
                       <div class="custom-control custom-radio">
                         <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                         <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                       </div>
                     </div>

                     </form>
                   </div>
                 </div>
               <!--size//-->

               <!--color-->
               <div class="sidebar-block px-3 px-lg-0">

                 <div class="expand-lg">
                   <h5 class="sidebar-heading d-none d-lg-block">Colour</h5>
                   <ul class="list-inline mb-0 colours-wrapper mt-4 mt-lg-0">
                     <li class="list-inline-item">
                       <label class="btn-colour  form-label" for="value_sidebar_Blue" style="background-color:#668cb9">
                       </label><div class="input-invisible">
                         <input type="checkbox" name="colour" id="value_sidebar_Blue" class="form-group-input">
                       </div>
                     </li>
                       <li class="list-inline-item">
                         <label class="btn-colour  form-label" for="value_sidebar_White" style="background-color:#fff">
                         </label>
                         <div class="input-invisible">
                           <input type="checkbox" name="colour" id="value_sidebar_White" class="form-group-input">
                         </div>
                       </li>
                       <li class="list-inline-item">
                         <label class="btn-colour  form-label" for="value_sidebar_Violet" style="background-color:#8b6ea4">
                         </label><div class="input-invisible">
                           <input type="checkbox" name="colour" id="value_sidebar_Violet" class="form-group-input">
                         </div></li><li class="list-inline-item">
                           <label class="btn-colour  form-label" for="value_sidebar_Red" style="background-color:#dd6265">
                           </label><div class="input-invisible">
                             <input type="checkbox" name="colour" id="value_sidebar_Red" class="form-group-input">
                           </div></li></ul></div>
                        </div>

               <!--color//-->
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
  @foreach($product as $productArr)

  <div class="col-xl-3 col-sm-4 col-6">
  <div class="product product-type-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="0">
  <div class="product-image mb-md-3"><a href="/tops-blouses/black-blouse">
  <span style="box-sizing:border-box;
  display:block;overflow:hidden;width:initial;height:initial;background:none;
  opacity:1;border:0;margin:0;padding:0;position:relative">
   <span style="box-sizing:border-box;display:block;width:initial;
   height:initial;background:none;opacity:1;border:0;margin:0;padding:0;
   padding-top:128.18627450980392%">
  </span>
  <img alt="product" src="{{asset('/storage/media/product/'.$product_attributes[$productArr->id][0]->img)}}" decoding="async" data-nimg="responsive" class="img-fluid" style="position:absolute;top:0;left:0;bottom:0;right:0;
  box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;
  min-width:100%;max-width:100%;min-height:100%;max-height:100%" sizes="100vw">
  </span>
  </a>
  <div class="product-hover-overlay">
     <a class="text-dark text-sm" aria-label="add to cart" href="#">
       <svg class="svg-icon text-hover-primary svg-icon-heavy d-sm-none">
         <use xlink:href="#retail-bag-1">
         </use></svg>
         <span class="d-none d-sm-inline">Add to cart</span></a>
         <div>
           <a class="text-dark text-hover-primary me-2" href="#" aria-label="add to wishlist">
             <svg class="svg-icon svg-icon-heavy">
               <use xlink:href="#heart-1"></use>
             </svg></a>

             <a class="text-dark text-hover-primary text-decoration-none" href="#" aria-label="open quickview"><svg class="svg-icon svg-icon-heavy">
               <use xlink:href="#expand-1"></use>
             </svg></a></div></div></div>

               <div class="position-relative"><h3 class="text-base mb-1">
                 <a class="text-dark" href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}}</a>
               </h3>
               <span style="font-weight:700 !important; font-size:1.3rem !important;
                line-height:1.25 !important; color:#812704 !important;">₹{{$product_attributes[$productArr->id][0]->price}}</span>
                <span style="text-decoration:line-through !important;
                font-size:1.1rem !important; line-height:1.5 !important;
                color:#555 !important;">₹{{$product_attributes[$productArr->id][0]->mrp}}</span>

               <div class="product-stars text-xs">
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>

              </div></div></div>
   </div>
 <!--product-->
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
@endsection

@section('footer')
  @include('front.partitions.footer')
@endsection
