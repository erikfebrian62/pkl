@extends('layouts.mainadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center text-center mb-5">
        <div class="col">
        <h3 class="fw-bold">Informasi Biodata Siswa</h3>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 p-5">
        <div class="col">
          <div class="card h-100">
            <div class="card-body text-center">
              <h5 class="card-title">Jumlah Siswa-Siswi</h5>
              <p class="card-text">{{ $users->count() }}</p>
            </div>
          </div>
        </div>
    
        <div class="col">
          <div class="card h-100">
            <div class="card-body text-center">
              <h5 class="card-title">Yang Sudah Voting</h5>
              <p class="card-text">...</p>
            </div>    
          </div>
        </div>
    
        <div class="col">
          <div class="card h-100">
            <div class="card-body text-center">
              <h5 class="card-title">Yang Belum Voting</h5>
              <p class="card-text">...</p>
            </div>    
          </div>
        </div>
    </div>
    <a href="{{ route('admin.biodata.create') }}" class="btn btn-success btn-sm mt-5">Tambah Data <i class="bi bi-plus-square"></i></a>
    <div class="card mt-2">
        @if(session('Success'))
            <div class="alert alert-success">
                {{session('Success')}}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $user->nis }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->class }}</td>
                                <td class="text-center">{{ $user->jurusan }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.biodata.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('admin.biodata.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
