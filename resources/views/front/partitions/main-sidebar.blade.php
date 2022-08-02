<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    @if(session())
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{url('profile')}}" class="d-block">
        <p>{{session()->get('USER_NAME')}}</p>
        <p>{{session()->get('USER_EMAIL')}}</p>
        </a>
      </div>
    </div>
  @endif
    <!-- Sidebar Menu -->

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
