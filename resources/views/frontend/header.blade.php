<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">
        <div class="col-md-2 col-12">
            <a class="navbar-brand mr-auto" href="#">Bazar</a>
        </div>
        
        <div class="col-md-6 search d-flex justify-content-center">
            <form class="form-inline my-2 my-lg-0 ml-5">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        
        <div class="collapse navbar-collapse d-flex justify-content-end col-md-4" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ route('register-user') }}">Register</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{ route('signout') }}">Logout</a>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="#">
                        <i class="fas fa-shopping-cart mr-2"></i>
                        Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-light navigation navbar-expand-lg">
  <!-- Navbar content -->
    
    <div class="container " id="navbarNav">
        <div class="col-md-12 ">
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                    @if ($category->parent)
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="{{ route('login') }}">{{ $category->parent->name}}</a>
                        </li>
                    @endif        
                @endforeach
            </ul>
        </div>
    </div>
</nav>