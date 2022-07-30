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
        <h3 class="card-title">size manager</h3>
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
        <form role="form" action="{{route('size.manage_size_process')}}" method="post" enctype="multipart/form-data">
          @csrf



             <div class="form-group">
              <label for="category_name">Size Name</label>
               <input type="text" class="form-control @error('size') is-invalid @enderror" id="category_name" name="size" value="{{$size}}{{old('size')}}" placeholder="Enter size name">
               @error('size')
                 <span class="error invalid-feedback">
                   {{$message}}
                 </span>
               @enderror
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
