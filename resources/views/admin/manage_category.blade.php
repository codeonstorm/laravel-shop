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

<div class="row">
  <div class="col-md-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">categories manager</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
          </button>

          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <form role="form" action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">

            <div class="col-md-4">
             <div class="form-group">
              <label for="category_name">Category Name</label>
               <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{$category_name}}{{old('category_name')}}" placeholder="Enter category name">
               @error('category_name')
                 <span class="error invalid-feedback">
                   {{$message}}
                 </span>
               @enderror
              </div>
            </div>


             <div class="col-md-4">
              <div class="form-group">
               <label for="parent_category">Parent Category</label>
               <select name="parent_category" class="form-control @error('parent_category') is-invalid @enderror" >
                 <option value="0">Select Categories</option>
                  @foreach($categories as $list)
                    @if($parent_category_id==$list->id)
                    <option selected value="{{$list->id}}">
                      @elseif(old('parent_category') == $list->id)
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
                <label for="category_slug">Category Slug</label>
                <input type="text" class="form-control
                @error('category_slug') is-invalid @enderror" id="category_slug" name="category_slug" value="{{$category_slug}}{{old('category_slug')}}" placeholder="Enter sub categories">
                @error('category_slug')
                  <span class="error invalid-feedback">
                    {{$message}}
                  </span>
                @enderror
               </div>

              </div>
            </div>

            <div class="form-group">
              <label for="category_image">Category Image</label>
              <div>
                <input type="file" accept="image/*" class="form-control @error('category_image') is-invalid @enderror" id="category_image" name="category_image" value="{{old('category_image')}}" onchange="upload_img1()" style="width:50%; float:left;">
                <span style="float:left;"><img id="demoimg1" width="40px;" height="38px"></span><br><br>
                @error('category_image')
                  <span class="error invalid-feedback">
                    {{$message}}
                  </span>
                @enderror


                  @if($category_image!='')
                    <a href="{{asset('storage/media/category/'.$category_image)}}" target="_blank">
                    <img width="100px" src="{{asset('storage/media/category/'.$category_image)}}"/></a>
                  @endif
              </div>
            </div>
            <br><br>

            <div class="form-group">



              <label for="is_home" class="control-label mb-1"> Show in Home Page</label>
              <input id="is_home" name="is_home" type="checkbox"
              "@if(old('is_home')) checked @endif"
               {{$is_home_selected}} >
            </div>
            @if($is_edit)
            <button type="submit" class="form-control" style="background-color:#007bff;
            color:#fff;" name="update" value="submit">Update</button>
            @else
            <button type="submit" class="form-control" style="background-color:#007bff;
            color:#fff;" name="add" value="submit">Add</button>
            @endif
            <input type="hidden" name="id" value="{{$id}}"/>
   <!-- /.card-body -->
  </form>
   </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
<!------------------------>
  <!-- /.col -->
</div>

<script>
function upload_img1(){
  var upload = document.getElementById("img1").value;
   if(img1.files[0].size<1048576){
     var url=URL.createObjectURL(img1.files[0]);
    var image=document.getElementById("demoimg1");
    demoimg1.src = url;
  }else{
    alert('image size is too large !');
  }}
  /* image2 */
  function upload_img2(){
    var upload = document.getElementById("img2").value;
     if(img2.files[0].size<1048576){
       var url=URL.createObjectURL(img2.files[0]);
      var image=document.getElementById("demoimg2");
      demoimg2.src = url;
    }else{
      alert('image2 size is too large !');
    }}
    /* image 3 */
    function upload_img3(){
      var upload = document.getElementById("img3").value;

      if(img3.files[0].size<1048576){

        var url=URL.createObjectURL(img3.files[0]);
        var image=document.getElementById("demoimg3");
        demoimg3.src = url;
      }else{
        alert('image size is too large !');
      }}
      /* image 4 */
      function upload_img4(){
        var upload = document.getElementById("img4").value;

        if(img4.files[0].size<1048576){

          var url=URL.createObjectURL(img4.files[0]);
          var image=document.getElementById("demoimg4");
          demoimg4.src = url;
        }else{
          alert('image size is too large !');
        }}
</script>
@endsection
