@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.visi.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ route('admin.kandidat.visi.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="candidate">
                        <option selected>Ketua</option>
                        @foreach ($candidates as $candidate)
                            <option value="{{ $candidate->id}}">{{ $candidate->ketua}} & {{ $candidate->wakil}}</option>
                        @endforeach
                      </select>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Visi" name="visi" id="floatingTextarea" style="height: 150px"></textarea>
                    <label for="floatingTextarea">Visi</label>
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection