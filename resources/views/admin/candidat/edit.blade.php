@extends('layouts.mainadmin')

@section('title')
Edit Data Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ route('admin.kandidat.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class=" mb-3">
                    <input type="file" class="form-control" name="img" id="img">
                    <input type="hidden" value="{{ $candidate->img}}" name="oldimage">
                    <img src="/images/{{ $candidate->img }}" class="mt-3" width="300px">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ketua" value="{{ $candidate->ketua }}" id="floatingInput" placeholder="Ketua">
                    <label for="floatingInput">Ketua</label>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="kelas_ketua">
                        <option selected>{{ $candidate->kelas_ketua }}</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="jurusan_ketua">
                        <option selected>{{ $candidate->jurusan_ketua}}</option>
                        <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                        <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                        <option value="Teknik Jaringan & Komputer">Teknik Jaringan & Komputer</option>
                        <option value="Teknik Ototronik">Teknik Ototronik</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Axioo Class Program">Axioo Class Program</option>
                        <option value="Perbankan">Perbankan</option>
                      </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="wakil" value="{{ $candidate->wakil }}" id="floatingInput" placeholder="Wakil">
                    <label for="floatingInput">Wakil</label>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="kelas_wakil">
                        <option selected>{{ $candidate->kelas_wakil }}</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="jurusan_wakil">
                        <option selected>{{ $candidate->jurusan_wakil}}</option>
                        <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                        <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                        <option value="Teknik Jaringan & Komputer">Teknik Jaringan & Komputer</option>
                        <option value="Ototronik">Ototronik</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Axioo Class Program">Axioo Class Program</option>
                        <option value="Perbankan">Perbankan</option>
                      </select>
                </div>
                <label for="floatingTextarea">Visi</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control ckeditor" placeholder="" name="visi" id="floatingTextarea" style="height: 150px">{{ $candidate->visi }}</textarea>
                </div>
                    <label for="floatingTextarea">Misi</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control ckeditor" placeholder="" name="misi" id="floatingTextarea" style="height: 150px">{!! $candidate->misi !!}</textarea>
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end"><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
