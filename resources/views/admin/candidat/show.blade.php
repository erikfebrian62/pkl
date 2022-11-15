@extends("layouts.mainadmin")

@section('title')
Biodata Kandidat
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.kandidat.index') }}" class="btn btn-primary btn-sm mt-3"><i class="bi bi-box-arrow-left"></i> Kembali</i></a>
    <div class="row justify-content-center mt-2">
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="{{ asset('images/'. $candidate->img) }}" alt="" class="img-fluid w-50">
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col-md-6">
                            <p class="fs-6 mb-0">Nama Ketua: </p>
                            <p class="fw-bold fs-7">{{$candidate->ketua}}</p>
                            <p class="fs-6 mb-0">Kelas: </p>
                            <p class="fw-bold fs-7">{{$candidate->kelas_ketua}}</p>
                            <p class="fs-6 mb-0">Jurusan: </p>
                            <p class="fw-bold fs-7">{{$candidate->jurusan_ketua}}</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="fs-6 mb-0">Nama Wakil Ketua: </p>
                            <p class="fw-bold fs-7">{{$candidate->wakil}}</p>
                            <p class="fs-6 mb-0">Kelas Wakil Ketua: </p>
                            <p class="fw-bold fs-7">{{$candidate->kelas_wakil}}</p>
                            <p class="fs-6 mb-0">Jurusan Wakil Ketua: </p>
                            <p class="fw-bold fs-7">{{$candidate->jurusan_wakil}}</p>
                        </div>
                        <div class="mt-5 text-center">
                            <h6 class="visi fw-bold">Visi</h6>
                            <p class="mt-3">{{$visi->visi}}</p>
                            <h6 class="visi fw-bold">Misi</h6>
                            <ol>
                                <li>{{$data->misi}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
