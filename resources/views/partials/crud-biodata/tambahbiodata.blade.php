@extends('admin.mainadmin')

@section('content')

<div class="container">
    <div class="col">
        <h3>Tambah Siswa</h3>
        <div class="card">
            <form method="post" action="{{route('admin.informasi-biodata')}}">
                @csrf
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        name="nama"
                        id="floatingInput"
                        class="form-control"
                        placeholder="Nama"
                        required="">
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        name="nis"
                        id="floatingInput"
                        class="form-control"
                        placeholder="NISN"
                        required="">
                    <label for="floatingInput">NISN</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        name="kelas"
                        id="floatingInput"
                        class="form-control"
                        placeholder="Kelas"
                        required="">
                    <label for="floatingInput">Kelas</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        name="jurusan"
                        id="floatingInput"
                        class="form-control"
                        placeholder="Jurusan"
                        required="">
                    <label for="floatingInput">Jurusan</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        name="password"
                        id="floatingInput"
                        class="form-control"
                        placeholder="Password"
                        required="">
                    <label for="floatingInput">Password</label>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
