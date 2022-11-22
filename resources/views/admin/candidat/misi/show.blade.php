@extends('layouts.mainadmin')

@section('title')
Biodata Dari Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.misi.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ketua" value="{{ $candidate->ketua}} & {{ $candidate->wakil}}" id="floatingInput" placeholder="Ketua" disabled>
                <label for="floatingInput">Ketua & Wakil</label>
            </div>
            @foreach ($misis as $item)
                <div class="form-floating">
                        <textarea class="form-control mb-2" placeholder="Visi" name="visi" value="" id="floatingTextarea" style="height: 150px" disabled>{!! $item->misi !!}
                        </textarea>
                        <a href="{{ route('admin.kandidat.misi.destroy', $item->id)}}" class="float-end btn btn-danger"><i class="bi bi-trash"></i></a>
                        <a href="{{ route('admin.kandidat.misi.edit', ['candidate' => $candidate->id, 'id' => $item->id])}}" class="me-2 float-end btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <label for="floatingTextarea">visi</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
