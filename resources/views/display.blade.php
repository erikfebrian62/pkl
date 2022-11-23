@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="awalan">
            <h1>Informasi Suara</h1>
            <p class="kk">Perolehan Hasil Vote Sementara.</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 p-5">

            @foreach($candidate as $candidate)
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="nomer">
                                <h5>{{ $loop->iteration }}</h5>
                            </div>
                            <img src="{{ asset('images/'. $candidate->img) }}" class="card-img-md-auto p-3" width="150px" alt="...">
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
                            <div class="col-md-6">
                                <p class="fs-6 mb-0">Nama Wakil Ketua: </p>
                                <p class="fw-bold fs-7">{{$candidate->wakil}}</p>
                                <p class="fs-6 mb-0">Kelas Wakil Ketua: </p>
                                <p class="fw-bold fs-7">{{$candidate->kelas_wakil}}</p>
                                <p class="fs-6 mb-0">Jurusan Wakil Ketua: </p>
                                <p class="fw-bold fs-7">{{$candidate->jurusan_wakil}}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6>Visi</h6>
                                    <p class="mt-3">{{$candidate->visi}}</p>
                            <div class="row">
                                <div class="col">
                                    <div class="suara">
                                        @php
                                            $suara=$count->where('candidate_id', $candidate->id)->count()
                                        @endphp
                                        <div class="d-inline-flex">
                                            <h6 id="suara_{{ $candidate->id}}">{{ $suara }}</h6>
                                            <h6 class="mx-1">Suara</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col" >
                                    <h6 style="float:right">Total dari {{ $users->count() }} murid</h6>
                                </div>

                            </div>

                            <div class="progress">
                            <div class="progress-bar" id="progress_{{ $candidate->id}}" role="progressbar" style="width: {{ $suara/$users->count()*100 }}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@push('script')
    <script>
        setInterval(() => {
            ambil();
        }, 9  00000);

        function ambil(){
            fetch('/api/voting')
            .then((response) => response.json())
            .then((data) => {
                let jmlpeserta = data.jmlhpeserta;
                data.candidate.forEach(item => {
                    let a = document.querySelector(`#progress_${item.id}`);
                    let b = document.querySelector(`#suara_${item.id}`);
                    let rata = item.vote_count / jmlpeserta * 100;
                    a.style.width = `${rata}%`;
                    b.innerHTML = item.vote_count;
                });
            });
        }
    </script>
@endpush
