@extends('layouts.mainadmin')

@section('content')
<div class="container">
    <h1 class="text-center fw-bold">BIODATA KANDIDAT</h1>
    <a href="{{ Route('admin.kandidat.create') }}" class="btn btn-success btn-sm mt-5">Tambah Data <i class="bi bi-plus-square"></i></a>
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
                        <th class="text-center">Profile</th>
                        <th class="text-center">Ketua</th>
                        <th class="text-center">Wakil</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($candidate as $candidate)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center"><img src="/images/{{ $candidate->img }}" width="40px"></td>
                                <td class="text-center">{{ $candidate->ketua }}</td>
                                <td class="text-center">{{ $candidate->wakil }}</td>
                                <td class="text-center">{{ $candidate->class }}</td>
                                <td class="text-center">{{ $candidate->jurusan }}</td>
                                <td class="text-center">
                                    <form action="edit-kandidat/{{ $candidate->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="edit-kandidat/{{ $candidate->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
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
