@extends('layouts.mainadmin')

@section('content')
<div class="container">
    <h1 class="text-center fw-bold">BIODATA KANDIDAT</h1>
    <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary btn-sm mt-5"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ route('admin.kandidat.update', $candidate->id) }}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class=" mb-3">
                    <input type="file" class="form-control" name="img" id="img">
                    <img src="/images/{{ $candidate->img }}" class="mt-3" width="300px">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ketua" value="{{ $candidate->ketua }}" id="floatingInput" placeholder="Ketua">
                    <label for="floatingInput">Ketua</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="wakil" value="{{ $candidate->wakil }}" id="floatingInput" placeholder="Wakil">
                    <label for="floatingInput">Wakil</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="class" value="{{ $candidate->class }}" id="floatingInput" placeholder="Kelas">
                    <label for="floatingInput">Kelas</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="jurusan" value="{{ $candidate->jurusan }}" id="floatingInput" placeholder="Jurusan">
                    <label for="floatingInput">Jurusan</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="visi" value="{{ $candidate->visi }}" id="floatingInput" placeholder="Jurusan">
                    <label for="floatingInput">Visi</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="misi" value="{{ $candidate->misi }}" id="floatingInput" placeholder="Jurusan">
                    <label for="floatingInput">Misi</label>
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
