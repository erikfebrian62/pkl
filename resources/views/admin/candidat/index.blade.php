@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.create') }}" class="btn btn-success btn-sm mt-3">Tambah Data <i class="bi bi-plus-square"></i></a>
    <a href="{{ route('admin.kandidat.visi.index') }}" class="btn btn-primary btn-sm mt-3 float-end ms-2">Kelola Visi</a>
    <a href="{{ route('admin.kandidat.misi.index')}}" class="btn btn-primary btn-sm mt-3 float-end ms-3">Kelola Misi</a>
    <div class="card mt-2">
        @include('partials.alert')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Profile</th>
                        <th class="text-center">Ketua</th>
                        <th class="text-center">Wakil</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($candidate as $candidate)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center"><img src="/images/{{ $candidate->img }}" width="100px"></td>
                                <td class="text-center">{{ $candidate->ketua }}</td>
                                <td class="text-center">{{ $candidate->wakil }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.kandidat.destroy', $candidate->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('admin.kandidat.show', $candidate->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></i></a>
                                        <a href="{{ route('admin.kandidat.edit', $candidate->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
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
