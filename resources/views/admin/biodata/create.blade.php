@extends('layouts.mainadmin')

@section('title')
Biodata Siswa
@endsection

@section('content')
<div class="container">
    <a href="{{ Route('admin.biodata.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="card mt-2">
        <div class="card-body">
            <form action="{{ route('admin.biodata.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="nis" id="floatingInput" placeholder="NIS">
                    <label for="floatingInput">NIS</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Nama">
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="class">
                        <option selected>Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="jurusan" id="jurusan">
                        <option selected>Jurusan</option>
                        <option value="TKRO">Teknik Kendaraan Ringan Otomotif</option>
                        <option value="TBSM">Teknik Bisnis Sepeda Motor</option>
                        <option value="TKJ">Teknik Jaringan & Komputer</option>
                        <option value="TO">Teknik Ototronik</option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                      </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingInput" placeholder="Passsword">
                    <label for="floatingInput">Password</label>
                </div>
                <button type="submit" class="btn  btn-success btn-md float-end"><i class="fa fa-save" > Simpan</i></button>
            </form>
        </div>
    </div>
</div>
@endsection
