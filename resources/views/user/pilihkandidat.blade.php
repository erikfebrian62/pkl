@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="awalan">
            <h1>Pilih Kandidat</h1>
            <p class="kk">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
                        <h6>Visi Misi</h6>
                        <p class="card-text">{{$candidate->visi}}</p>

                        <!-- Button trigger modal -->
                        <p type="button" class="detail-btn" data-bs-toggle="modal" data-bs-target="#kandidat{{ $candidate->id }}" data-id="{{ $candidate->id }}">
                            Lihat Selengkapnya...
                        </p>

                        <!-- Modal -->
                        <div class="modal fade" id="kandidat{{ $candidate->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" class="rounded">
                            <div class="modal-dialog modal-dialog-centered modal-lg ">
                            <div class="modal-content p-4">
                                <div class="modal-body">
                                <div class="float-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label ="Close"></button>
                                </div>
                                <h5>Kandidat</h5>
                                <h1>NO {{ $loop->iteration }}</h1><br><br>
                                {{-- <div class="col-auto">
                                    <img src="{{ asset('images/'. $candidate->img) }}" width="250px" class="rounded" alt="">
                                </div> --}}
                                    {{-- <div class="col-auto">
                                    <div class="row d-block px-3">
                                        <div class="col">
                                            <h6>Nama Ketua:</h6>
                                            <h5>{{$candidate->name_ketua}}</h5>
                                        </div>
                                        <div class="col">
                                        <h6>Kelas:</h6>
                                        <h5>{{$candidate->kelas_ketua}}</h5>
                                        </div>
                                        <div class="col">
                                        <h6>Jurusan:</h6>
                                        <h5>{{$candidate->jurusan_ketua}}</h5>
                                        </div>
                                        <div class="col">
                                        <h6>Nama Wakil Ketua:</h6>
                                        <h5></h5>
                                        </div>
                                        <div class="col">{{$candidate->wakil_ketua}}
                                        <h6>Kelas:</h6>
                                        <h5>{{$candidate->kelas_wakil}}</h5>
                                        </div>
                                        <div class="col">
                                        <h6>Jurusan:</h6>
                                        <h5>{{$candidate->jurusan_wakil}}</h5>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <h6 class="viisi-misi fw-bold">Visi Misi</h6>
                                    <p class="mt-3">{{$candidate->visi}}</p>
                                    <p class="mt-3">{{$candidate->misi}}</p>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <img src="{{ asset('images/'. $candidate->img) }}" alt="" class="img-fluid w-100">
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
                                    <div class="col-md-6">
                                        <p class="fs-6 mb-0">Nama Wakil Ketua: </p>
                                        <p class="fw-bold fs-7">{{$candidate->wakil}}</p>
                                        <p class="fs-6 mb-0">Kelas Wakil Ketua: </p>
                                        <p class="fw-bold fs-7">{{$candidate->kelas_wakil}}</p>
                                        <p class="fs-6 mb-0">Jurusan Wakil Ketua: </p>
                                        <p class="fw-bold fs-7">{{$candidate->jurusan_wakil}}</p>
                                    </div>
                                    <h6 class="viisi-misi fw-bold">Visi Misi</h6>
                                    <p class="mt-3">{{$candidate->visi}}</p>
                                    <ul class="nav flex-column p-3">
                                        <li class="nav-item">{{$candidate->misi}}</li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @if ($votes < 1)
                        <form action="{{ route('user.kandidat.pilih', $candidate->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100" onclick="confirm('Apakah anda yakin?')">Pilih</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach
        </div>
    </div>
@endsection

@push('ajax')
<script>
    // $('#kandidat').modal('hide');

    // $(document).ready(function() {
    //     $('.detail-btn').click(function() {
    //         const id = $(this).attr('data-id');

    //         $.ajax({
    //             url: 'kandidat/'+ id,
    //             type: 'GET',
    //             success: function(data) {
    //                 console.log(data)
    //                 $('#nama_ketua').html(data.name_ketua)
    //                 $('#kelas_ketua').html(data.kelas_ketua)
    //                 $('#jurusan_ketua').html(data.jurusan_ketua)
    //                 $('#nama_wakil_ketua').html(data.wakil_ketua)
    //                 $('#kelas_wakil_ketua').html(data.kelas_wakil_ketua)
    //                 $('#jurusan_wakil_ketua').html(data.jurusan_wakil_ketua)
    //                 $('#visi').html(data.visi)
    //                 $('#misi').html(data.misi)
    //             }
    //         })
    //     })
    })
</script>
@endpush
