@extends('layouts.mainadmin')

@section('title')
Struktur Organisasi
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.pemenang.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ Route('admin.pemenang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" mb-3">
                    <input type="text" class="form-control" name="candidate_id">
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection