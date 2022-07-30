@extends('admin/layout')
@section('page_title','Category')
@section('dashboard_select','active')

@section('container')
<style media="screen">
  svg{
    height : 10px;
  }
</style>
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
<div class="card">
                    <div class="col-md-12">
                    <div class="card-header border-transparent" style="background:#28a745;">
                      <h3 class="card-title">SIZE
                   </h3>


                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </button>

                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>

                      </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table m-0 table-bordered table-dark table-striped table-hover ">
                          <thead>
                          </thead><thead>
                          <tr>
                            <th>ID</th>
                            <th>size</th>
                            <th>status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                          </thead>

                          <tbody>
                            @foreach ($data as $list)
                          <tr>
                          <td>{{$list->id}}</td>
                          <td>{{$list->size}}</td>
<td>
  @if($list->status==1)
     <a href="{{url('admin/size/status/0')}}/{{$list->size}}"><button type="button" class="btn btn-primary">Active</button></a>
  @elseif($list->status==0)
     <a href="{{url('admin/size/status/1')}}/{{$list->size}}"><button type="button" class="btn btn-warning">Deactive</button></a>
 @endif
 </td>
<td>
  <a class="btn btn-info btn-sm" href="{{url('admin/size/manage_size/')}}/{{$list->size}}">
    <i class="fas fa-pencil-alt"></i>Edit</a>
  </td>
  <td>&nbsp;<a class="btn btn-danger" href="{{url('admin/size/delete/')}}/{{$list->size}}"><i class="fas fa-trash"></i></a>
  </td>                  </tr>
                            @endforeach

                                         </table>

                      </div>
                      <!-- /.table-responsive -->
                    </div>

                  </div>
</div>
    {{ $data->links() }}

@endsection
