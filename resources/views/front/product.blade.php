@extends('front.layout')
@section('page_title', 'Home')

@section('header')
  @include('front.partitions.header')
@endsection

@section('main-sidebar')
  @include('front.partitions.main-sidebar')
@endsection

@section('container')
@php 
 echo $errors->status;
  //check rating validation
  if($errors->status ){
   // echo "<sript>alert('please fill correct!')</script>";
  }
@endphp
<div class="content">
      <div class="container">
        <section class="content">
          <!-- Default box -->
          <div class="product-card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-5">
                  <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
                  <div class="col-12" style="min-height: 60%;">
                    <img src="{{asset('storage/media/product/'.$product_attr_img[$product_attr[$id]->id][0]->img)}}" class="product-image" alt="Product Image">
                  </div>
                  <div class="product-image-thumbs" style="">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                  </div>
                </div>
                <div class="col-12 col-sm-7" style="padding-left: 9%;">
                  <h3 class="my-3">{{$product->name}}</h3>
                  <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
                    <ul class="list-inline mb-2 mb-sm-0"><li class="list-inline-item h4 fw-light mb-0">$<!-- -->{{$product_attr[$id]->price}}</li>
                      <li class="list-inline-item text-muted fw-light"><del>$<!-- -->{{$product_attr[$id]->mrp}}</del>
                      </li></ul>
                      <div class="d-flex align-items-center text-sm">
                        <div>

                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>
                               <i class="fas fa-star text-warning"></i>

                      </div>
                      <span class="text-muted text-uppercase">25 reviews</span></div></div>

                  <p class="mb-4 text-muted">{{$product->short_desc}}</p>

                  <hr>

                  <form id="frmAddToCart">
                    <div class="row">
                      <div class="detail-option mb-4 col-lg-12 col-sm-6">
                         @csrf

                         @if($colors)
                         <p class="mt-2 text-muted">Available Colors</p>
                        <div class="btn-group btn-group-toggle" id="colors" data-toggle="buttons">
                        @foreach($colors as $attr)
                        @if($product_attr[$id]->name==$attr)
                          <label class="btn btn-default text-center letter-spacing active">
                            <input type="radio" name="color" value="{{$attr}}" onChange="change_product('{{$attr}}')" autocomplete="off" checked="checked">
                            {{$attr}}
                            <br>
                            <i class="fas fa-circle fa-2x text-{{$attr}}"></i>
                          </label>
                        
                        @else
                        <label class="btn btn-default text-center letter-spacing">
                            <input type="radio" name="color" value="{{$attr}}" onChange="change_product('{{$attr}}')" autocomplete="off">
                            {{$attr}}
                            <br>
                            <i class="fas fa-circle fa-2x text-{{$attr}}"></i>
                          </label>
                          @endif
                        @endforeach
                        </div>
                        @endif

                        @if($sizes)
                        <p class="mt-3 text-muted">Size <small>Please select one</small></p>
                        <div class="btn-group btn-group-toggle" id="sizes" data-toggle="buttons">
                        @foreach($sizes as $attr)
                                           
                          <label class="btn btn-default text-center">
                            <input type="radio" name="size" id="size" value="{{$attr}}">
                            <span class="text-lg">{{$attr}}</span>
                          </label>
                          @endforeach
                        </div>
                        @endif

                        @if(empty($sizes) && empty($colors))
                        
                        <div class="btn-group">
                        @foreach($product_attr as $attr)
                                       
                              <a href="{{url('product/'.$product->slug.'/patid/'.$attr->id)}}">
                              <div class="active">
                              <img src="{{asset('storage/media/product/'.$product_attr_img[$attr->id][0]->img)}}"
                               alt="" width="80px">
                              </div>
                              </a> &nbsp; &nbsp;
                         
                          @endforeach
                        </div>
                        @endif

                        <div><p id="msg" class="text-danger"></p></div>
                        <div class="mt-3 input-group" style="width:55%">
                          <input type="number" name="qty" id="qty" class="detail-quantity form-control form-control-lg" value="1">
                          <div class="flex-grow-1">
                            <div class="d-grid h-100">
                              <div class="btn btn-primary btn-lg btn-flat" onClick="add_to_cart()">
                                               <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                               Add to Cart
                                             </div>
                        </div></div></div>

                        <div class="mt-4">
                          <div class="btn btn-default btn-lg btn-flat wishlist-btn">
                            <i class="fas fa-heart fa-lg mr-2 heart"></i>
                             <span class="mb-4 text-muted"><small>Add to Wishlist</small></span>
                          </div>
                        </div>

                        <ul class="list-unstyled"><li><strong>Category:&nbsp;</strong><a class="text-muted" href="#">Jeans</a></li><li><strong>Tags:&nbsp;</strong><a class="text-muted" href="#">Leisure</a>,&nbsp;<a class="text-muted" href="#">Elegant</a></li></ul>

                        <div class="mt-4 product-share">
                          <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                          </a>
                          <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                          </a>
                        </div>




                      </div>
                    </div>
                  </form>


                </div>
              </div>
              <div class="row mt-4">
                <nav class="w-100">
                  <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">ADDITIONAL INFORMATION</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">reviews / Rating</a>
                  </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                  <div class="tab-pane fade show text-muted active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="row">
                      <div class="col-11">
                      {{$product->desc}}
                      </div>

                    </div>

                   </div>
                  <div class="tab-pane text-muted fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    <div class="row">
                      <div class=" col-md-6 mt-3">
                        <div class="block">
                          <p style="letter-spacing: .1em;
                          text-transform: uppercase;"># Product -</p>
                          <div class="row">
                            <div class="col-4">
                              <b class="letter-spacing">figcaption :</b>
                            </div>
                            <div class="col-6 ml-2">
                              <p>Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet.</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-4">
                              <b class="letter-spacing">figcaption :</b>
                            </div>
                            <div class="col-6 ml-2">
                              <p>Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet.</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-4">
                              <b class="letter-spacing">figcaption :</b>
                            </div>
                            <div class="col-6 ml-2">
                              <p>Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet.</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class=" col-md-6 mt-3">
                        <div class="block">
                          <p style="letter-spacing: .1em;
                          text-transform: uppercase;"># Features -</p>
                          <div class="row">
                            <div class="col-4">
                              <b class="letter-spacing">venenatis :</b>
                            </div>
                            <div class="col-6 ml-2">
                              <p>Vivamus rhoncus nisl sed venenatis luctus. </p>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="tab-pane text-muted fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                    <div class="row">
                      <div class="post col-md-8">
                            <div class="user-block">
                              <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                              <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <div class="rating">
                                   <i class="fas fa-star text-warning"></i>
                                   <i class="fas fa-star text-warning"></i>
                                   <i class="fas fa-star text-warning"></i>
                                   <i class="fas fa-star text-warning"></i>
                                   <i class="fas fa-star text-warning"></i>
                                 </div>
                              </span>
                              <span class="description">Shared publicly - 7:45 PM today
                              </span>
                            </div>
                            <!-- /.user-block -->
                            <p class="ml-5">
                              Lorem ipsum represents a long-held tradition for designers,
                              typographers and the like. Some people hate it and argue for
                              its demise, but others ignore.
                            </p>

                          </div>
                      <div class="rating-frm col-md-4">
                        <div class="card shadow-none">
                          <div class="card-header border-0">
                            <h2 class="card-title" style="letter-spacing: .1em;
                            text-transform: uppercase;"><b>Leave a review</b></h2>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form method="get">
                            <div class="card-body">
                              <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="name">Name *</label>
                                  <input type="text" class="form-control" id="name" name="name" value="{{session()->get('USER_NAME')}}" placeholder="Enter Name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="rating">Rate product & service *</label>
                                  <select class="form-control" id="rating" name="rating">
                                      <option value="5">
                                        &#9733;&#9733;&#9733;&#9733;&#9733; (5/5)
                                      </option>
                                      <option value="4">
                                        &#9733;&#9733;&#9733;&#9733;&#9734; (4/5)
                                      </option>
                                      <option value="3">
                                        &#9733;&#9733;&#9733;&#9734;&#9734; (3/5)
                                      </option>
                                      <option value="2">
                                        &#9733;&#9733;&#9734;&#9734;&#9734; (2/5)
                                      </option>
                                      <option value="1">
                                        &#9733;&#9734;&#9734;&#9734;&#9734; (1/5)
                                      </option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="review">Review text *</label>
                                <textarea class="form-control" id="review" name="review" placeholder="Enter your review"></textarea>
                              </div>
                              <input type="hidden" name="id" value="{{$product_attr[$id]->id}}">
                                <button type="submit" class="btn btn-primary">Post Review</button>
                            </div>
                            <!-- /.card-body -->
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
      </div>
   </div>

  <form id="">
    <input type="hidden" id="size_id" name="size_id"/>
    <input type="hidden" id="color_id" name="color_id"/>
    <input type="hidden" id="pqty" name="pqty" value="1"/>
    <input type="hidden" id="p_id" name="pid" value="{{$product->id}}"/>
    <input type="hidden" id="attr_id" name="atr_id" value="{{$product_attr[$id]->id}}"/>
    @csrf
  </form>
  @endsection

@section('footer')
  @include('front.partitions.footer')
  <script type="text/javascript">

  /*=====================================
    change qty JS
  ======================================*/

  function add_qty(color){
    var qty=jQuery('#qty').val();
    jQuery("[name='pqty']").val(qty);
  }

  /*=====================================
    change_product_color_image JS
  ======================================*/
 

  function change_product(color){
    window.location.href='{{url("product/".$product->slug)}}/'+color;
    /*var size_id=jQuery('#size_id').val();
    var pid=jQuery('#p_id').val();

    if(size_id==''){
    jQuery('#add_to_cart_msg').html('<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select size</div>');
    }

      jQuery.ajax({
        url:window.location.href+'/../../product_attr/',
        data:'size='+size_id+'&color='+color+'&pid='+pid+'&_token='+jQuery("[name='_token']").val(),
        type:'post',
        success:function(result){
          if(result.status=="error"){
            jQuery('#msg').html(result.msg);
          }

          if(result.status=="success"){

            jQuery('.simpleLens-big-image-container').html('<a data-lens-image="'+result.img.img+'" class="simpleLens-lens-image"><img src="{{asset("storage/media/product/")}}/'+result.img.img+'" class="simpleLens-big-image"></a>');
            jQuery('#price').html('Rs '+result.price);
            jQuery('#mrp').html('Rs '+result.mrp);
            jQuery("[name='pqty']").val('1');
            jQuery("[name='atr_id']").val(result.attr_id);
            //jQuery('#frmLogin')[0].reset();
            //jQuery('#thank_you_msg').html(result.msg);
          }
        }
      });*/
  /*  else if(color_id==''){
      jQuery('#add_to_cart_msg').html('<div class="alert alert-danger fade in alert-dismissible mt10"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select color</div>');
    }*/

  }

 


  /*=====================================
    add to cart JS
  ======================================*/
  function add_to_cart(){
    var colors=document.getElementById('colors');
    var sizes=document.getElementById('sizes');
 
    jQuery('#msg').html('');
    var color = jQuery("input[name='color']:checked").val();
    var size = jQuery("input[name='size']:checked").val();
    if(typeof color=='undefined' && colors!=null){
      jQuery('#msg').html('Select Color');
      return;
    }

    if( typeof size=='undefined' && sizes!=null){
      jQuery('#msg').html('Select Size');
      return;
    }
    
    var pAttrId={{$product_attr[$id]->id}};
    jQuery.ajax({
      type:'post',
      url:'/add_to_cart',
      data:'product_attr_id='+pAttrId+'&'+jQuery('#frmAddToCart').serialize(),
      success:function(result){
        alert('your product '+result.msg+' into cart!');

      }
    });
    }
/*
    jQuery('#frmAddToCart').click(function(e){
      var pAttrId=jQuery('#attr_id').val();
     var qty=jQuery('#pqty').val();

        jQuery.ajax({
         url:'/add_to_cart',
         data:jQuery('#frmLogin').serialize(),
         type:'post',
         success:function(result){
           if(result.status=="error"){
             jQuery('#login_msg').html(result.msg);
           }
      
           if(result.status=="success"){
            window.location.href=window.location.href+"/../";
             //jQuery('#frmLogin')[0].reset();
             //jQuery('#thank_you_msg').html(result.msg);
           }
         }
       });
      });*/
  </script>
@endsection
