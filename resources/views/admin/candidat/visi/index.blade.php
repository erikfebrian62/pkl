@extends('layouts.mainadmin')

@section('tittle')
Visi Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <a href="{{ route('admin.kandidat.visi.create')}}" class="btn btn-success btn-sm sm-3 mt-3 float-end">Tambah Data <i class="bi bi-plus-square"></i></a>
    <div class="card mt-2">
        @include('partials.alert')
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th class="text-center">Ketua & Wakil Ketua</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($candidates as $candidate)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $candidate->ketua}} & {{ $candidate->wakil}}</td>
                                <td class="text-center">
                                        <a href="{{ route('admin.kandidat.visi.show', $candidate->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></i></a>
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
