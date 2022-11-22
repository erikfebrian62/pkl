@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.visi.show', $visi->id) }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <form action="{{ route('admin.kandidat.visi.update', $visi->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ketua" value="{{ $candidate->ketua}} & {{ $candidate->wakil}}" id="floatingInput" placeholder="Ketua" disabled>
                <label for="floatingInput">Ketua & Wakil</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Visi" name="visi" value="" id="floatingTextarea" style="height: 150px">{{ $visi->visi}}</textarea>
                <label for="floatingTextarea">Visi</label>
            </div>
            <div>
                <button type="submit" class="btn  btn-success btn-md mb-3 float-end"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
