@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.misi.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <form action="{{ route('admin.kandidat.misi.index')}}">
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ketua" value="{{ $candidates->ketua}} & {{ $candidates->wakil}}" id="floatingInput" placeholder="Ketua" disabled>
                    <label for="floatingInput">Ketua & Wakil</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Misi" name="misi" value="" id="floatingTextarea" style="height: 150px">{{ $misi->misi }}
                    </textarea>
                    <label for="floatingTextarea">Misi</label>
                </div>
                    <button type="submit" class="btn  btn-success btn-md float-end"><i class="fa fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection