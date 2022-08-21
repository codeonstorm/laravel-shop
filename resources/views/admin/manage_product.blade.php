@extends('admin/layout')
@section('page_title','Manage Category')
@section('dashboard_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
   {{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@endif
@include('admin.partitions.multi-img-upload-modal')
@include('admin.partitions.product-attr-features-modal')
<form role="form" action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
   <div class="card">
      <div class="card-header" style="background-color:#ffc107;">
         <h3 class="card-title"> Insert All Product</h3>
         <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
         </div>
      </div>
      <div class="card-body">
         @csrf
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="product_name" name="name" value="{{$name}}{{old('name')}}" placeholder="Enter product name">
                  @error('name')
                  <span class="error invalid-feedback">
                  {{$message}}
                  </span>
                  @enderror
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" class="form-control @error('category') is-invalid @enderror" >
                     <option value="0">Select Categories</option>
                     @foreach($categories as $list)
                     @if($category_id==$list->id)
                     <option selected value="{{$list->id}}">
                        @else
                     <option value="{{$list->id}}">
                        @endif
                        {{$list->name}}
                     </option>
                     @endforeach
                  </select>
                  @error('parent_category')
                  <span class="error invalid-feedback">
                  {{$message}}
                  </span>
                  @enderror
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="slug">Product Slug</label>
                  <input type="text" class="form-control
                     @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{$slug}}{{old('slug')}}" placeholder="Enter product slug">
                  @error('slug')
                  <span class="error invalid-feedback">
                  {{$message}}
                  </span>
                  @enderror
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="is_featured">is featured</label>
                  <select name="is_featured" class="form-control @error('is_featured') is-invalid @enderror" >
                     <option value="1">yes</option>
                     <option value="0">no</option>
                  </select>
                  @error('is_featured')
                  <span class="error invalid-feedback">
                  {{$message}}
                  </span>
                  @enderror
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="is_tranding">is tranding</label>
                  <select name="is_tranding" class="form-control @error('is_tranding') is-invalid @enderror" >
                     <option value="1">yes</option>
                     <option value="0">no</option>
                  </select>
                  @error('is_tranding')
                  <span class="error invalid-feedback">
                  {{$message}}
                  </span>
                  @enderror
               </div>
            </div>
         </div>
         {{$short_desc}}
         <div class="mb-3">
            <label for="short_desc">Short desc</label>
            <textarea id="short_desc" name="short_desc" value="" placeholder="Enter Product Short description" style="width: 100%; height: 92px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="">{{$short_desc}}{{old('short_desc')}}</textarea>
         </div>
         <div class="mb-3">
            <label for="desc">desc</label>
            <textarea id="desc" name="desc" value="" placeholder="Enter Product description" style="width: 100%; height: 92px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="">{{$desc}}{{old('desc')}}</textarea>
         </div>
         <div class="mb-3">
            <label for="keywords">keywords</label>
            <textarea id="keywords" name="keywords" value="" placeholder="Enter Product keywords" style="width: 100%; height: 92px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="">{{$keywords}}{{old('keywords')}}</textarea>
         </div>
      </div>
      <!-- /.card -->
   </div>
   <!---------end product section--------------->
   <!--======-->
   <h3>Add Product Attributes</h3>
   <div id="product_attr_box">
      @php
      $loop_count_num=0;
      @endphp
      @foreach($productAttrArr as $key=>$pAArr)
  @php
    //  $loop_count_prev=$loop_count_num;
      @endphp
      <input id="paid" type="hidden" name="paid[]" value="{{$pAArr['id']}}">
      <div class="card" id="product_attr_{{$loop_count_num}}">
         <div class="card-body">
            <div class="form-group">
               <div class="row">
                  <div class="col-md-2">
                     <label for="sku" class="control-label mb-1"> SKU</label>
                     <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['sku']}}" required>
                  </div>
                  <div class="col-md-2">
                     <label for="mrp" class="control-label mb-1"> MRP</label>
                     <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['mrp']}}" required>
                  </div>
                  <div class="col-md-2">
                     <label for="price" class="control-label mb-1"> Price</label>
                     <input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['price']}}" required>
                  </div>
                  <div class="col-md-3">
                     <label for="size_id" class="control-label mb-1"> Size</label>
                     <select id="size_id" name="size_id[]" class="form-control">
                        <option value="">Select</option>
                        @foreach($sizes as $list)
                        @if($pAArr['size_id']==$list->id)
                        <option value="{{$list->id}}" selected>{{$list->size}}</option>
                        @else
                        <option value="{{$list->id}}">{{$list->size}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
                  <div class="col-md-3">
                     <label for="color_id" class="control-label mb-1"> Color</label>
                     <select id="color_id" name="color_id[]" class="form-control">
                        <option value="">Select</option>
                        @foreach($colors as $list)
                        @if($pAArr['color_id']==$list->id)
                        <option value="{{$list->id}}" selected>{{$list->name}}</option>
                        @else
                        <option value="{{$list->id}}">{{$list->name}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
                  <div class="col-md-2">
                     <label for="qty" class="control-label mb-1"> Qty</label>
                     <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['qty']}}" required>
                  </div>
                  <div class="col-md-4">
                     <label for="attr_image" class="control-label mb-1"> Image</label>
                     @php
                      $img_is = $loop_count_num - 1;
                     @endphp
                     <input id="attr_image" name="attr_image[{{$loop_count_num}}][]" type="file" class="form-control"   multiple>
                     <a href="#sort" data-toggle="modal"><button type="button" class="multi_images_modal btn btn-warning"  value="{{$pAArr['id']}}">Uploded Images</button></a>
                     <a href="#features" data-toggle="modal"><button type="button" class="pro_attr_features btn btn-warning"  value="{{$pAArr['id']}}">Add Features</button></a>
                <!--     <input id="attr_image" name="attr_image[{{$pAArr['id']}}][]" type="file" class="form-control" multiple>-->
<!--
                     <input id="images" name="attr_image[]" type="file" onchange="image_select()" class="form-control" multiple>
                        <div id="images_show"></div> -->
                  </div>
                  <div class="col-md-2">

                     @if($loop_count_num!=0)
                     <!--<button type="button" class="btn btn-success btn-lg" onclick="add_more()">
                        <i class="fa fa-plus"></i>&nbsp; Add</button>-->
                     @else
                     <a href="{{url('admin/product/product_attr_delete/')}}/{{$pAArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger btn-lg">
                     <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
      @php
      $loop_count_num++;
      @endphp
      @endforeach
   </div>
   <!--Add Product Attributes-->
   <!-- /.card -->
   <div class="card">
      <div class="card-body">
         <div>
            <span>
               <h4>Add more Attributes</h4>
            </span>
            <button type="button" class="btn btn-success btn-m" onclick="add_more()">
            <i class="fa fa-plus"></i>&nbsp; Add</button>
         </div>
      </div>
   </div>

   <!------------------------>
   <!-- /.col -->

   @if($is_edit)
   <button type="submit" class="form-control" style="background-color:#007bff;
      color:#fff;" name="update" value="submit">Update</button>
   @else
   <button type="submit" class="form-control" style="background-color:#007bff;
      color:#fff;" name="add" value="submit">Add</button>
   @endif
   <input type="hidden" name="id" value="{{$id}}">
</form>

<script>
// var images = [];
// function image_select(){
//    var image = document.getElementById('images').files;
//    for (i=0; i<image.length; i++){
//       if(check_duplicate_img(image[i].name)){
//          images.push({
//          "name" : image[i].name,
//          "url" : URL.createObjectURL(image[i]),
//          "file" : image[i],
//          "size" : image[i].size,
//       });
//       }else{ alert('This image ('+image[i].name+' is already! )'); }
//    }
//    console.log(image);
//    //document.getElementById('images').;
//    document.getElementById('images_show').innerHTML=images_show();
// }

// function images_show(){
//    var imgs = "";
//    images.forEach((e)=>{
//       imgs+='<div><img src="'+e.url+'" width="100px"><span class="position-absolute" style="cursor:pointer;" onclick="delete_img('+images.indexOf(e)+')">&times;</span></div>';
//    });
//    return imgs;
// }

// function delete_img(index){
//    images.splice(index, 1);
//   // document.getElementById('images').files=images;
//    document.getElementById('images_show').innerHTML=images_show();
// }

// function check_duplicate_img(name){
//    if(images.length>0){
//       for(e=0; e<images.length; e++){
//          if(images[e].name == name){
//             return false;
//          }
//       }
//    }
//    return true;
// }
   // function upload_img1(){
   //   var upload = document.getElementById("img1").value;
   //    if(img1.files[0].size<1048576){
   //      var url=URL.createObjectURL(img1.files[0]);
   //     var image=document.getElementById("demoimg1");
   //     demoimg1.src = url;
   //   }else{
   //     alert('image size is too large !');
   //   }}
   //   /* image2 */
   //   function upload_img2(){
   //     var upload = document.getElementById("img2").value;
   //      if(img2.files[0].size<1048576){
   //        var url=URL.createObjectURL(img2.files[0]);
   //       var image=document.getElementById("demoimg2");
   //       demoimg2.src = url;
   //     }else{
   //       alert('image2 size is too large !');
   //     }}
   //     /* image 3 */
   //     function upload_img3(){
   //       var upload = document.getElementById("img3").value;
   //
   //       if(img3.files[0].size<1048576){
   //
   //         var url=URL.createObjectURL(img3.files[0]);
   //         var image=document.getElementById("demoimg3");
   //         demoimg3.src = url;
   //       }else{
   //         alert('image size is too large !');
   //       }}
   //       /* image 4 */
   //       function upload_img4(){
   //         var upload = document.getElementById("img4").value;
   //
   //         if(img4.files[0].size<1048576){
   //
   //           var url=URL.createObjectURL(img4.files[0]);
   //           var image=document.getElementById("demoimg4");
   //           demoimg4.src = url;
   //         }else{
   //           alert('image size is too large !');
   //         }}

           // imp

      var loop_count={{$loop_count_num - 1}};
      function add_more(){
          loop_count++;
          var html='<input id="paid" type="hidden" name="paid[]" ><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';

          html+='<div class="col-md-2"><label for="sku" class="control-label mb-1"> SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

          html+='<div class="col-md-2"><label for="mrp" class="control-label mb-1"> MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

          html+='<div class="col-md-2"><label for="price" class="control-label mb-1"> Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

          var size_id_html=jQuery('#size_id').html();
          size_id_html = size_id_html.replace("selected", "");
          html+='<div class="col-md-3"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="size_id[]" class="form-control">'+size_id_html+'</select></div>';

          var color_id_html=jQuery('#color_id').html();
          color_id_html = color_id_html.replace("selected", "");
          html+='<div class="col-md-3"><label for="color_id" class="control-label mb-1"> Color</label><select id="color_id" name="color_id[]" class="form-control" >'+color_id_html+'</select></div>';

          html+='<div class="col-md-2"><label for="qty" class="control-label mb-1"> Qty</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

          html+='<div class="col-md-4"><label for="attr_image" class="control-label mb-1"> Image</label><input id="attr_image" name="attr_image['+loop_count+'][]" type="file" class="form-control"   multiple></div>';

          html+='<div class="col-md-2"><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';

          html+='</div></div></div></div>';

          jQuery('#product_attr_box').append(html)
      }
      function remove_more(loop_count){
           jQuery('#product_attr_'+loop_count).remove();
      }

</script>
@endsection
