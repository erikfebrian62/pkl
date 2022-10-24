@extends('layouts.main')

@section('content')
        <div class="awalan">
            <h1>Pilih Kandidat</h1>
            <p class="kk">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 p-5">

        @foreach($candidates as $candidate)
            <div class="col">
                <div class="card h-100">
                    <div class="col">
                        <div class="nomer">
                            <h5>{{ $loop->iteration }}</h5>
                        </div>
                        <img src="IMG/bill.jpg" class="card-img-md-auto" width="150px" alt="...">
                        <div class="nama">
                            <h5>Nama: {{$candidate->nama}}</h5>
                            <h5>Kelas: {{$candidate->kelas}} RPL</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6>Visi Misi</h6>
                        <p class="card-text">{{$candidate->visi}}</p>








                        <!-- Button trigger modal -->
                        <p type="button" class="" data-bs-toggle="modal" data-bs-target="#kandidat{{ $candidate->id }}">
                            Lihat Selengkapnya...
                        </p>



                        <!-- Modal -->
                        <div class="modal fade" id="kandidat {{ $candidat->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" class="rounded">
                            <div class="modal-dialog modal-dialog-centered modal-lg ">
                            <div class="modal-content p-4">
                                <div class="modal-body">
                                <div class="row float-end">
                                    <div class="col">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label ="Close"></button>
                                    </div>
                                </div>
                                <h5>Kandidat</h5>
                                <h1>NO {{ $loop->iteration }}</h1><br><br>
                                <div class="row justify-content-start">
                                    <div class="col-auto">
                                    <img src="img/bill.jpg" width="130px" class="rounded" alt="">
                                    </div>
                                    <div class="col-auto">
                                    <div class="row d-block px-3">
                                        <div class="col">
                                        <h6>NAMA</h6>
                                        <h5>{{$candidate->nama}}</h5>
                                        </div>
                                        <div class="col">
                                        <h6>KELAS</h6>
                                        <h5>{{$candidate->kelas}} RPL</h5>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <h6 class="viisi-misi fw-bold">Visi Misi</h6>
                                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur eveniet rerum provident quos voluptate alias enim minima consequatur ipsa illum debitis, asperiores molestiae deserunt corrupti in quae cum mollitia consectetur.</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <a class="btn btn-primary w-100" data-bs-toggle="modal" href="#popup1" role="button">Pilih</a>
                    </div>
                </div>
            </div>

        @endforeach
        </div>

@endsection
