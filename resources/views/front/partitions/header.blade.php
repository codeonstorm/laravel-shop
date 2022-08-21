@php
$getAddToCartTotalItem=getAddToCartTotalItem();
$totalCartItem=count($getAddToCartTotalItem);
$totalPrice=0;
@endphp
<header>
  <div class="top-bar text-sm ">
    <div class="px-lg-5 py-2 container-fluid">
      <div class="align-items-center row">

      </div>
    </div>
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{url('')}}" class="navbar-brand">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Laravel-Shop</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse" style="justify-content: space-between; margin-right: 10%;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
            </ul>
          </li>


        </ul>

        <!-- SEARCH FORM -->
        <form action="{{url('search/')}}" class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item pt-2">
          @if(session()->get('USER_ID'))
          <a class="text-muted text-hover-dark" href="{{url('logout')}}">logout</a>
          @else
          <a class="text-muted text-hover-dark" href="{{url('login')}}">login</a>
          @endif
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-shopping-cart"></i>
            <span class="badge badge-warning navbar-badge">{{$totalCartItem}}</span>
          </a>
        </li>

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
    <!-- Navbar -->
    <style media="screen">
      .dropdown-menu{
position: relative;
position:static;
 float: right;

 width:255px;
      }
    </style>
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white border-0 show">
    <div class="container">
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav" style="    flex-direction: column;">

        </ul>
      </div>
    </div>

  </nav>
  <!-- /.navbar -->
</header>
