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
 
    </div>
    @include('front.partitions.profile')
  </div>
</div>
@endsection


@section('footer')
  @include('front.partitions.footer')
@endsection
