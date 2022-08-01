<div class="col-12 d-flex align-items-center justify-content-center">
    <div class="col-md-8">
        <div class="card card-primary card-outline">
        <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{session()->get('USER_NAME')}}</h3>

        <p class="text-muted text-center">{{session()->get('USER_EMAIL')}}</p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <a href="{{url('orders')}}">
             <b>Orders</b> <a class="float-right">1,322</a>
            </a>
            </li>
            <li class="list-group-item">
            <a href="{{route('logout')}}">
            <b>Profile</b> 
            </a>
            </li>
            <li class="list-group-item">
            <b>Address</b> <a class="float-right"></a>
            </li>
            <li class="list-group-item">
            <b>Wishlist</b> <a class="float-right">13</a>
            </li>
            <li class="list-group-item">
            <a href="{{route('logout')}}">
            <b>Logout</b> 
            </a>
            </li>
        </ul>

        <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
        </div>
        <!-- /.card-body -->
    </div>
    </div>
</div>