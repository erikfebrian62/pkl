@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.pemenang.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ route('admin.pemenang.update', $pemenang->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class=" mb-3">
                    <input type="file" class="form-control" name="img" id="img">
                    <input type="hidden" value="{{ $pemenang->img }}" name="oldImage">
                    <img src="/images/{{ $pemenang->img }}" class="mt-3" width="300px">
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
