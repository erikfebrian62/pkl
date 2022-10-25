@extends('layouts.mainadmin')

@section('content')
<div class="container">
    <h1 class="text-center fw-bold">BIODATA KANDIDAT</h1>
    <a href="{{ Route('admin.kandidat.index') }}" class="btn btn-primary btn-sm mt-5"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ route('admin.kandidat.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="nis" id="floatingInput" placeholder="Image">
                    <label for="floatingInput">Image</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Ketua">
                    <label for="floatingInput">Ketua</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Wakil">
                    <label for="floatingInput">Wakil</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="class" id="floatingInput" placeholder="Kelas">
                    <label for="floatingInput">Kelas</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="jurusan" id="floatingInput" placeholder="Jurusan">
                    <label for="floatingInput">Jurusan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="jurusan" id="floatingInput" placeholder="Visi">
                    <label for="floatingInput">Visi</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="jurusan" id="floatingInput" placeholder="Misi">
                    <label for="floatingInput">Misi</label>
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection