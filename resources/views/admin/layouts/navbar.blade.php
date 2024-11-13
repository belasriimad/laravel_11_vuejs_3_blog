<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('admin.index')}}">Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('home')}}">
              <i class="fas fa-user"></i>
              {{ auth()->guard('admin')->user()->name }}
            </a>
          </li>
          <li class="nav-item">
            <a onclick="document.getElementById('adminLogoutForm').submit();" 
              class="nav-link" href="#">
              <i class="fas fa-sign-out"></i>
              Logout
            </a>
            </li>
          <form action="{{route('admin.logout')}}" id="adminLogoutForm" method="post">
            @csrf
          </form>
      </div>
    </div>
  </nav>