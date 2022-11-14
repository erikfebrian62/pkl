@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="awalan">
            <h1>Pilih Kandidat</h1>
            <p class="kk">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>


        @if ($message = session('Error'))
            <div class="my-3 alert alert-danger">
                {{ $message }}
            </div>
        @endif

          @if($message = session('danger'))
          <div class="alert alert-danger">
            {{ $message }}
          </div>
          @endif

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
                          @foreach ($candidate->visi as $visis)
                            <p class="mt-3">{{$visis->visi}}</p>
                          @endforeach

                        <!-- Button trigger modal -->
                        <p type="button" class="btn btn-light sm-3" data-bs-toggle="modal" data-bs-target="#kandidat{{ $candidate->id }}" data-id="{{ $candidate->id }}">
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
                                    <h6 class="viisi-misi fw-bold">Visi</h6>
                                    @foreach ($candidate->visi as $visis)
                                      <p class="mt-3">{{$visis->visi}}</p>
                                    @endforeach
                                    <h6 class="viisi-misi fw-bold">Misi</h6>
                                    <ol>
                                      @foreach ($candidate->misi as $misis)
                                        <li class="mt-3">{{$misis->misi}}</li>
                                      @endforeach
                                    </ol>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @if($votes < 1)
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

    <div class="modal fade" id="pilih{{ $candidate->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body" >
              <div class="row justify-content-center">
                <div class="col-start-center">
                  <h3 class="text-center">Apakah anda yakin akan memilih kandidat ini ?</h3>
                </div>
              </div>
              <br>
              <div class="row justify-content-center align-items-center text-center">
                <div class="col">
                  <form action="{{ route('user.kandidat.pilih', $candidate->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">YA saya yakin</button>
                  </form>
                </div>
              </div><br>
              <div class="row justify-content-center align-items-center text-center">
                <div class="col">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
              </div>
              <br>
              <br>
            </div>
            </div>


          </div>
        </div>
      </div>
      <div class="modal fade" id="popup2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body" class="container-text-center">
              <div class="row float-end">
                <div class="col">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
              <div class="row justify-content-center align-items-center text-center" style="margin-top:60px ">
                <div class="col">
                  <svg xmlns="http://www.w3.org/2000/svg" color="green" width="100" height="100" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                  </svg>
                </div>
                </div><br>
                <div class="row justify-content-center align-items-center text-center">
                <div class="col">
                  <h2>Voting Berhasil</h2>
                </div>
            </div><br>
            <div class="row justify-content-center align-items-center text-center">
              <div class="col">
                <p>Terimakasih atas partisipan anda  dalam voting pemilihan ketua osis</p>
              </div>
          </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('ajax')
<script>
    // // $('#kandidat').modal('hide');

    // // $(document).ready(function() {
    // //     $('.detail-btn').click(function() {
    // //         const id = $(this).attr('data-id');

    // //         $.ajax({
    // //             url: 'kandidat/'+ id,
    // //             type: 'GET',
    // //             success: function(data) {
    // //                 console.log(data)
    // //                 $('#nama_ketua').html(data.name_ketua)
    // //                 $('#kelas_ketua').html(data.kelas_ketua)
    // //                 $('#jurusan_ketua').html(data.jurusan_ketua)
    // //                 $('#nama_wakil_ketua').html(data.wakil_ketua)
    // //                 $('#kelas_wakil_ketua').html(data.kelas_wakil_ketua)
    // //                 $('#jurusan_wakil_ketua').html(data.jurusan_wakil_ketua)
    // //                 $('#visi').html(data.visi)
    // //                 $('#misi').html(data.misi)
    // //             }
    // //         })
    // //     })
    // })
</script>
@endpush
