<nav class="navbar navbar-expand-lg p-4" style="background-color: #00102e">
    <div class="container">
      <img class="logo" src="/images/logo.png" alt="">
      <a class=" judul navbar-brand fw-bold h4 text-white" href="#">E-Voting <br>OSIS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hallo Admin,  <b>{{ Auth::user()->name }}</b>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.biodata.index') }}">Biodata Siswa</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.kandidat.index') }}">Edit Kandidat</a></li>
              <li><a class="dropdown-item" href="#">Informasi Pemenang dan <br> Struktur Organisasi</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>
