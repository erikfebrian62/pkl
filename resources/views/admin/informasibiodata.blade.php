@extends('layouts.mainadmin')

@section('content')
    @include('')

        <div class="container">
            <a class="btn btn-success" href="{{route('admin.informasi-biodata')}}"><i class="fa fa-plus"></i> Tambah Siswa</a><br><br>
            <div class="row justify-content-center align-items-center text-center mb-5">

                <div class="card h-100">
                    <table class="table">
                        <thead class="table-light">
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        @php $no = 1; @endphp
                        @foreach ($Biodata as $b)
                        <tbody>
                            <th scope="row">{{$no++}}</td>
                            <td class="text-center">{{$b->name}}</td>
                            <td class="text-center">{{$b->nis}}</td>
                            <td class="text-center">{{$b->class}}</td>
                            <td class="text-center">{{$b->jurusan}}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('hapusbiodata', $b->nis) }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tbody>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>
@endsection
