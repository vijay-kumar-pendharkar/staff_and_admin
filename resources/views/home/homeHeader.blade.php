<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Staff & Admin Login</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
      
        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
          <li class="nav-item">
            @if (Route::has('login'))

                @auth 
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="btn btn-success">Logout</a>
                </li>

                @else
                <li class="nav-item">
                    <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
                </li>
                &nbsp;&nbsp;
                <li class="nav-item">
                    <a href="{{ route('register')}}" class="btn btn-success" >Register</a>
                </li>

                @endauth
            @endif
          </li>
       
        </ul>
   
      </div>
    </div>
  </nav>