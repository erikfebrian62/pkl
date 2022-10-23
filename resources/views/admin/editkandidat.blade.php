
@extends('layouts.mainadmin')

@section('content')
        <div class="awalan">
            <h1>Pilih Kandidat</h1>
            <p class="kk">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        @foreach ($visimisi=[] as $visimisi)
        <div class="row row-cols-1 row-cols-md-3 g-4 p-5">
            <div class="col">
                <div class="card h-100">
                    <div class="col">
                        <div class="nomer">
                            <h5>1</h5>
                        </div>
                        <img src="img/bill.jpg" class="card-img-md-auto" width="150px" alt="...">
                        <div class="nama">
                            <h5>Nama: Bill</h5>
                            <h5>Kelas: 11 RPL</h5>
                            <h5>Hobi: Sepak Bola</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6>Visi Misi</h6>
                        <p class="card-text">{{ $visimisi }}</p>
                            <br>
                            @include('partials.editdetail')

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <div class="col">
                        <div class="nomer">
                            <h5>2</h5>
                        </div>

                        <img src="img/bill.jpg" class="card-img-md-auto" width="150px" alt="...">
                        <div class="nama">
                            <h5>Nama: Bill</h5>
                            <h5>Kelas: 11 RPL</h5>
                            <h5>Hobi: Sepak Bola</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6>Visi Misi</h6>
                        <p class="card-text">{{ $visimisi }}</p>
                            <br>
                            @include('partials.editdetail')

                    </div>
                </div>
            </div>
            

            
            <div class="col">
                <div class="card h-100">
                    <div class="col">
                        <div class="nomer">
                            <h5>3</h5>
                        </div>

                        <img src="img/bill.jpg" class="card-img-md-auto" width="150px" alt="...">
                        <div class="nama">
                            <h5>Nama: Bill</h5>
                            <h5>Kelas: 11 RPL</h5>
                            <h5>Hobi: Sepak Bola</h5>
                        </div>
                    </div>
                        <div class="card-body">
                            <h6>Visi Misi</h6>
                            <p class="card-text">{{ $visimisi }}</p>
                                <br>
                                @include('partials.editdetail')


                        </div>
                    
                    </div>

            </div>
        </div>
        @endforeach

        
@endsection