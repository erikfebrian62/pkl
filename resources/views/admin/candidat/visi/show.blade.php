@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.visi.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ketua" value="{{ $candidates->ketua}} & {{ $candidates->wakil}}" id="floatingInput" placeholder="Ketua">
                <label for="floatingInput">Ketua & Wakil</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Visi" name="visi" value="" id="floatingTextarea" style="height: 150px"></textarea>
                <label for="floatingTextarea"></label>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection