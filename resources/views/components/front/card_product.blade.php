  <div class="col-xl-3 col-sm-4 col-6">
  <div class="product product-type-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="0">
  <div class="product-image mb-md-3"><a href="{{url('product/'.$product->slug)}}">
  <span style="box-sizing:border-box;
  display:block;overflow:hidden;width:initial;height:initial;background:none;
  opacity:1;border:0;margin:0;padding:0;position:relative">
   <span style="box-sizing:border-box;display:block;width:initial;
   height:initial;background:none;opacity:1;border:0;margin:0;padding:0;
   padding-top:128.18627450980392%">
  </span>
  <img alt="product" src="{{asset('/storage/media/product/'.$image)}}" decoding="async" data-nimg="responsive" class="img-fluid" style="position:absolute;top:0;left:0;bottom:0;right:0;
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
                 <a class="text-dark" href="{{url('product/'.$product->slug)}}">{{$product->name}}</a>
               </h3>
               <span style="font-weight:700 !important; font-size:1.3rem !important;
                line-height:1.25 !important; color:#812704 !important;">₹{{$attr->price}}</span>
                <span style="text-decoration:line-through !important;
                font-size:1.1rem !important; line-height:1.5 !important;
                color:#555 !important;">₹{{$attr->mrp}}</span>

               <div class="product-stars text-xs">
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>
                 <i class="fas fa-star text-warning"></i>

              </div></div></div>
 </div>
