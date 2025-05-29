<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My Laravel Website')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/images/favicon.png">

<meta name="description" content="Readings – A wide collection of fiction, non-fiction, and children’s books." />
<meta name="keywords" content="books, online bookstore, fiction, non-fiction, readings" />
<meta name="author" content="Readings Team" />

 <style>

  body {
    font-family: 'Poppins', sans-serif;
  margin-top: 92px; 
  }
.second-navbar {
  top: 70px; /* height of the first navbar */
  z-index: 1030; /* should be the same or higher than the first navbar */
}
.text-brown {
  color: #5d4037 !important;
}

.bg-brown {
  background-color: #5d4037; /* Chocolate brown */
}

.brown-hover {
  transition: background-color 0.3s ease, color 0.3s ease;
}

.brown-hover:hover {
  background-color: #3e2723; /* Darker brown on hover */
  color: #ffffff !important;
}
.my-footer{
  background-color:#5d4037;
}

.btn-primary {
  background: linear-gradient(135deg, #795548, #5d4037);
  border: none;
  box-shadow: 0 4px 6px rgba(0,0,0,0.2);
}
.navbar-toggler {
  border-color: #fff;
}
.navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23ffffff' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}
.nav-link:hover {
  text-decoration: underline;
  color: #ffccbc !important;
}

.logout{
  color:black;
}
    </style>
</head>
<body>
    <header>
      <!-- 1st Navbar  -->
<nav class="navbar fixed-top navbar-expand-lg bg-brown text-white shadow-sm py-3">

  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center text-white" href="#">
    @auth
    @if(Auth::user()->profile_picture)
        <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="User Avatar" height="50" width="50" class="me-2 rounded-circle shadow-sm" />
    @else
        <img src="/images/reading.png" alt="Default Avatar" height="50" width="50" class="me-2 rounded-circle shadow-sm" />
    @endif
@else
    <img src="/images/reading.png" alt="Logo" height="50" width="50" class="me-2 rounded-circle shadow-sm" />
@endauth

      <span class="fw-bold fs-4">Readings</span>
    </a>

    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" 
      aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
    <a class="nav-link fw-semibold text-white" href="{{ url('profile') }}">
        <i class="bi bi-person-circle me-1"></i>@auth
    {{ Auth::user()->name }}
@endauth

    </a>
</li>

        <li class="nav-item position-relative">
          <a class="nav-link fw-semibold text-white d-flex align-items-center" href="{{ route('cart.index') }}">
            <i class="bi bi-cart3 fs-5 me-1"></i>Cart
            @if(session('cart'))
              <span class="badge bg-danger rounded-pill ms-2 position-absolute top-0 start-100 translate-middle">
                {{ count(session('cart')) }}
              </span>
            @endif
          </a>
        </li>

        @guest
          <li class="nav-item">
            <a class="nav-link fw-semibold text-white" href="{{ route('login') }}">
              <i class="bi bi-box-arrow-in-right me-1"></i>Sign In
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold text-white" href="{{ route('register') }}">
              <i class="bi bi-person-plus me-1"></i>Sign Up
            </a>
          </li>
        @else
      
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="nav-link btn btn-link fw-semibold text-white p-0">
                <i class="bi bi-box-arrow-right me-1 logout"></i>Logout
              </button>
            </form>
          </li>
          
        @endguest
      </ul>
<form class="d-flex align-items-center bg-white p-2 rounded shadow-sm" role="search" action="{{ route('shop.index') }}" method="GET">
  <input class="form-control me-2 border-0" type="search" name="search" placeholder="Search books..." aria-label="Search" value="{{ request('search') }}" />
  <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
</form>

    </div>
  </div>
</nav>


<!--2nd navbar  -->
            <!-- FICTION,NON-FICTION,CHILDREN,HISTORY -->
<nav class="navbar sticky-top navbar-expand-lg bg-brown shadow-sm border-top border-bottom py-2">
  <div class="container-fluid justify-content-center gap-4 flex-wrap">
    <a  href="{{ url('/fiction') }}" class="nav-link fw-semibold text-light px-3 py-1 rounded brown-hover">Fiction
</a>
    <a  href="{{ url('/NonFiction') }}" class="nav-link fw-semibold text-light px-3 py-1 rounded brown-hover" >Non-Fiction</a>
    <a class="nav-link fw-semibold text-light px-3 py-1 rounded brown-hover" href="{{ url('/Children') }}" >Children</a>
    <a class="nav-link fw-semibold text-light px-3 py-1 rounded brown-hover" href="{{ url('/history') }}">History</a>

  
  </div>
</nav>
    </header>


 <main class="container py-5 px-3">
      @yield('content')
    </main>

<footer class="my-footer text-light py-3 mt-5">
  <div class="container text-center">
    <p class="mb-2">&copy; {{ date('Y') }} Readings Bookstore. All rights reserved.</p>
    <div class="mb-2">
      <a href="#" class="text-light mx-2"><i class="bi bi-facebook">Reading_fb</i></a>
      <a href="#" class="text-light mx-2"><i class="bi bi-instagram">readings.official</i></a>
      <a href="#" class="text-light mx-2"><i class="bi bi-twitter-x">readings.offical12</i></a>
    </div>
    <p class="mb-0">
      <a href="#" class="text-light text-decoration-none">Privacy Policy</a> |
      <a href="#" class="text-light text-decoration-none">Terms of Service</a>
    </p>
  </div>
</footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
