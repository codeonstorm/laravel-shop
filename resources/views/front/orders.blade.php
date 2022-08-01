@extends('front.layout')
@section('page_title', 'Home')

@section('header')
  @include('front.partitions.header')
@endsection

<!-- apply condition to check session to show  this page-->

@section('container')
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
                      <th>Payment Type</th>
                      <th>Total Amount</th>
                      <th>Payment Status</th>
                      <th>Order Status</th>
                      <th>Order On</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)

                    <tr>
                      <td><a href="{{url('order_detail/'.$order->id)}}">#{{$order->id}}</a></td>
                      <td>{{$order->payment_type}}</td>
                      <td>{{$order->total_amt}}</td>
                      <td>{{$order->payment_status}}</td>
                      @if($order->status)
                      <td><span class="badge badge-info">{{$order->status}}</span></td>
                      @endif
                      <td><!--badge-warning badge-danger badge-info-->
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->created_at}}</div>
                      </td>
                    </tr>
                    @endforeach              
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