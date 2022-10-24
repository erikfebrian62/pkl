<nav class="navbar navbar-expand-lg bg-white p-4">
    <div class="container">
      <a class="navbar-brand fw-bold h4" href="#">E-Voting <br>OSIS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ Route('admin.biodata') }}">Biodata Siswa</a></li>
              <li><a class="dropdown-item" href="{{ Route('admin.edit-kandidat') }}">Edit Kandidat</a></li>
              <li><a class="dropdown-item" href="#">Informasi Pemenang dan <br> Struktur Organisasi</a></li>
              <li><a class="dropdown-item" href="{{ Route('logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>
