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
      <!-- order success alert-->
      <div class="col-md-12">
            <div class="callout callout-info  shadow-none">
             <h5><i class="fas fa-info"></i><b> Order: #{{session()->get('ORDER_ID')}}</b></h5>
             <p class="text-muted">
               Order #{{session()->get('ORDER_ID')}} was placed on {{date('d-m-Y')}} and is currently under process.<br>
               <small>
                 if you have any questions, please contact us.
               </small>
             </p>
           </div>
          </div>
      <!--// order success alert-->
      <!-- address detail-->
      <div class="invoice col-md-12 p-3 mb-3">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-globe"></i> AdminLTE, Inc.
                            <small class="float-right">Date: 2/10/2014</small>
                          </h4>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                            <strong>Admin, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Phone: (804) 123-5432<br>
                            Email: info@almasaeedstudio.com
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                            <strong>John Doe</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Phone: (555) 539-1037<br>
                            Email: john.doe@example.com
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>Invoice #007612</b><br>
                          <br>
                          <b>Order ID:</b> 4F3S8J<br>
                          <b>Payment Due:</b> 2/22/2014<br>
                          <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!--//address detail-->

                  <!-- product -order-details-->
                  <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Products</h3>
              </div>

                <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Perfect Item
                      <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
           </div>
          </div>
          <!--//product-->
          <!--order-summary-->
          <div class="col-md-6">
            <div class="card">
             <div class="card-header">
               <h3 class="card-title">Order Summary</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
              <b>Order Subtotal</b> <a class="float-right">1,322</a>

               <hr>

               <b>Shipping</b> <a class="float-right">322</a>

               <hr>

               <b>Tax</b> <a class="float-right">322</a>

               <hr>

               <b>Toatal</b> <a class="float-right">32200</a>

             </div>
             <!-- /.card-body -->
           </div>
          </div>
          <!--//order-summary-->
    </div>
    @include('front.partitions.profile')
  </div>
</div>
@endsection


@section('footer')
  @include('front.partitions.footer')
@endsection
