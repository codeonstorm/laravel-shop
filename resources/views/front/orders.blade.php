@extends('front.layout')
@section('page_title', 'Home')

@section('header')
  @include('front.partitions.header')
@endsection

<!-- apply condition to check session to show  this page-->

@section('container')
@foreach($orders as $order)
  @php 
  prx($order);
  @endphp
@endforeach
<div class="content">
  <div class="container">
  <div class="row">
          <div class="col-md-12">
            <div class="card shadow-none">
              <div class="card-header border-0">
                <h3 class="card-title">Latest Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Order On</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">#{{$order->id}}</a></td>
                      <td>Call of Duty IV</td>
                      @if($order->status)
                      <td><span class="badge badge-success">Shipped</span></td>
                      @endif
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->created_at}}</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">{{$order->created_at}}</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-info">Processing</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                      </td>
                    </tr>                   
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body  
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
           .card-footer -->
            </div>
           </div>
    </div>
    @include('front.partitions.profile')
  </div>
</div>
@endsection


@section('footer')
  @include('front.partitions.footer')
@endsection