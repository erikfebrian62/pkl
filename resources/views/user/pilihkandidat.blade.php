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
                                        <li class="mt-3">{!!$misis->misi!!}</li>
                                      @endforeach
                                    </ol>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @if($votes < 1)
                            <button type="submit" class="btn btn-primary w-100 btnvotes" data-id="{{ $candidate->id }}" data-nama="{{ $candidate->ketua }}">Pilih</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center align-items-center text-center mb-4">
            <div class="col-md-4">
                <a href="{{ route('user.informasi-pemenang')}}" class="btn btn-primary">Lihat Pemenang</a>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>

    $('.btnvotes').click( function(){

        var userid = $(this).attr('data-id');
        var username = $(this).attr('data-nama');
         const swalWithBootstrapButtons = Swal.mixin({
                 customClass: {
                     confirmButton: 'btn btn-success',
                     cancelButton: 'btn btn-danger me-2'
                 },
                 buttonsStyling: false
                 })

                 swalWithBootstrapButtons.fire({
                 title: 'Yakin?',
                 text: "Anda akan memilih kandidat "+username+"" ,
                 icon: 'question',
                 showCancelButton: true,
                 confirmButtonText: 'Ya, saya yakin.',
                 cancelButtonText: 'Tidak',
                 reverseButtons: true
                 }).then((result) => {
                 if (result.isConfirmed) {
                     window.location = "/user/pilih-kandidat/"+userid+""
                     swalWithBootstrapButtons.fire(
                     'Voting Berhasil',
                     'Terimakasih atas partisipan anda dalam voting pemilihan ketua OSIS',
                     'success',
                     )
                 } else if (
                     /* Read more about handling dismissals below */
                     result.dismiss === Swal.DismissReason.cancel
                 ) {
                     swalWithBootstrapButtons.fire(
                     'Tidak jadi',
                     'Anda  :)',
                     'error'
                     )
                 }
                 });
     });
</script>
@endpush
