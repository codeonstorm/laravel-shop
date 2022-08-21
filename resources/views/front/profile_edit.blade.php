@extends('front.layout')
@section('page_title', 'Home')

@section('stylesheet')

@endsection

@section('header')
  @include('front.partitions.header')
@endsection

@section('main-sidebar')
  @include('front.partitions.main-sidebar')
@endsection

@section('container')
<div class="content">
  <div class="container">
  <div class="row">
          <div class="col-md-12">
            <div class="card shadow-none">
              <div class="card-header border-0">
                <h3 class="card-title">Change your password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Old password</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="password">New password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="password_cnfrm">confirm password</label>
                      <input type="password" class="form-control" id="password_cnfrm" placeholder="Repeat Password">
                    </div>
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card shadow-none">
              <div class="card-header border-0">
                <h3 class="card-title">Personal details</h3>
              </div>
              @if(session()->has('status'))
              <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                 {{session('msg')}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
                 </button>
              </div>
              @endif
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{url('profile/update')}}">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="name">name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="name">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="village">Village</label>
                      <input type="text" class="form-control" id="village" name="village" value="{{$user->address}}" placeholder="Village">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="company">Company (optional)</label>
                      <input type="text" class="form-control" id="company" name="company" value="{{$user->company}}" placeholder="Company">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="zip">Zip</label>
                      <input type="text" class="form-control" id="zip" name="zip" value="{{$user->zip}}" placeholder="zip">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="state">State</label>
                      <input type="text" class="form-control" id="state" name="state" value="{{$user->state}}" placeholder="State">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="city">City</label>
                      <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}" placeholder="City">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="country">Country</label>
                      <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}" placeholder="Country">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="mobile">Mobile</label>
                      <input type="number" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" placeholder="Mobile">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Email">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection


@section('footer')
  @include('front.partitions.footer')
@endsection
