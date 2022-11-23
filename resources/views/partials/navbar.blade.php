<nav class="navbar navbar-expand-lg p-4" style="background-color: #00102e">
    <div class="container">
      <img class="logo" src="/images/logo.png" alt="">
      <a class="navbar-brand text-light" href="#"><h4 class="judul">E-Voting <br>SMK Pertiwi Kuningan</h4></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        @if(Auth::check())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hallo, <b>{{ Auth::user()->name }}</b>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a href="" class="nav-link">Login</a>
          </li>
        @endif
        </ul>
      </div>
      @yield('konten')
    </div>
</nav>
