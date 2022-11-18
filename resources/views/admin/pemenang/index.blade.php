@extends('layouts.mainadmin')

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.pemenang.create')}}" class="btn btn-success btn-sm my-3">Tambah Data <i class="bi bi-plus-square"></i></a>
    @include('partials.alert')
    <div class="card mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">image</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($pemenang as $pemenang)
                            <tr>
                                    <td class="text-center"><img src="{{ asset('images/'. $pemenang->img) }}" width="500px"></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.pemenang.destroy', $pemenang->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('admin.pemenang.show', $pemenang->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></i></a>
                                            <a href="{{ route('admin.pemenang.edit', $pemenang->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
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
