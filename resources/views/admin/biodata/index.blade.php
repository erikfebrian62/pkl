@extends('layouts.mainadmin')

@section('title')
Biodata Siswa
@endsection

@section('content')
<div class="container">
    @if (session('success'))
        <div class="my-3 alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif
    <div class="my-3">
        <a href="{{ route('admin.biodata.import') }}" class="btn btn-success btn-sm mt-3">Import <i class="bi bi-database-add"></i></a>
        <a href="{{ route('admin.biodata.export') }}" class="btn btn-info btn-sm mt-3 float-end">Export <i class="bi bi-file-earmark-text"></i></a>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <div class="my-3 col-12">
                        <form action="{{ route('admin.biodata.index') }}" method="GET">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" placeholder="search" value="{{ request('search') }}">
                                <button class="input-group-text"><i class="bi bi-search mb-2"></i></button>
                            </div>
                        </form>
                    </div>
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
