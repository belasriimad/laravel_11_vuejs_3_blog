<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel 11 Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">
              @if (session('lang') === 'fr')
                Accueil
              @else 
                Home
              @endif
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu">
              @guest
                <li><a class="dropdown-item" href="{{route('register')}}">
                  <i class="fas fa-user-plus"></i>  
                  Register
                </a></li>
                <li><a class="dropdown-item" href="{{route('login')}}">
                  <i class="fas fa-sign-in"></i>  
                  Login</a></li>
              @endguest
              @auth
                <li><a class="dropdown-item" href="#">
                  <i class="fas fa-user"></i>
                  {{ auth()->user()->name }}</li>
                <li><a onclick="document.getElementById('logoutForm').submit();" class="dropdown-item" href="#">
                  <i class="fas fa-sign-out"></i>
                  Logout</a></li>
                <form action="{{route('logout')}}" id="logoutForm" method="post">
                  @csrf
                </form>
              @endauth
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Languages
            </a>
            <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item
                    @if (session('lang') === 'fr')
                      bg-danger text-white rounded
                    @endif
                    " href="{{route('change.lang','fr')}}">
                    <i class="fas fa-language"></i>
                    French
                  </a>
                </li>
                <li>
                  <a class="dropdown-item
                    @if (session('lang') === 'en')
                      bg-danger text-white rounded
                    @endif
                    " href="{{route('change.lang','en')}}">
                    <i class="fas fa-language"></i>
                    English
                  </a>
                </li>
            </ul>
          </li>
        </ul>
        <search-button></search-button>
      </div>
    </div>
  </nav>
  <search-tab 
    :placeholder="@if(session()->get('lang') === 'fr') 'Recherche' @else 'Search' @endif"></search-tab>