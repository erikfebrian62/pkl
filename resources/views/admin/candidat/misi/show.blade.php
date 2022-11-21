@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.misi.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ketua" value="{{ $candidates->ketua}} & {{ $candidates->wakil}}" id="floatingInput" placeholder="Ketua" disabled>
                <label for="floatingInput">Ketua & Wakil</label>
            </div>
            <div class="card-body">
                <ol class="list-group list-group-numbered">
                    @foreach ($misi as $item)
                        <li class="list-group-item">{{$item->misi}}
                            @csrf
                            <a href="{{ route('admin.kandidat.misi.destroy', $candidates->id)}}" class="float-end btn btn-danger"><i class="bi bi-trash"></i></a>
                            <a href="{{ route('admin.kandidat.misi.edit', $candidates->id)}}" class="me-2 float-end btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
