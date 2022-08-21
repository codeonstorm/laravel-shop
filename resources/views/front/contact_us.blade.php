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
            <h3 class="card-title">Contact With Us</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-6">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter email">
                </div>
                <div class="form-group col-6">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <label for="msg">Message</label>
                  <textarea id="msg" class="form-control" name="msg" rows="8" cols="80">Enter Message Here...</textarea>
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
@endsection

@section('footer')
  @include('front.partitions.footer')
@endsection
