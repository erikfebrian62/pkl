@extends('layouts.mainadmin')

@section('title')
Biodata Siswa
@endsection

@section('content')
<div class="my-3 col-12 col-sm-8 col-md-5">
    <form action="{{ route('admin.biodata.imports') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <button type="submit" class="btn btn-success mt-3" >Import</button>
    </form>
</div>
@endsection
