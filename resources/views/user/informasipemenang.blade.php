@extends('layouts.main')

@section('content')
    <div class="container">
      <br><br>
        <div class="row justify-content-center align-items-center text-center mb-5">
            <div class="col">
              <h3>Informasi pemenang dan struktur oranisasi</h3>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque rerum aliquam voluptatem ipsum. Repellat illo, reprehenderit quos minima placeat deserunt ad! Quis culpa illo enim architecto esse tempora officiis autem.</p>
            </div>
        </div>

        
        <div class="card p-5">
          <div class="nomer">
            <h5>1</h5>
          </div>
            <div class="card-body">
                <div class="row justify-content-start">
                    <div class="col-auto">
                      <img src="img/bill.jpg" width="130px" class="rounded" alt="">
                    </div>
                    <div class="col-auto">
                      <div class="row d-block px-3">
                        <div class="col">
                          <h6>NAMA</h6>
                          <h5>Muhammad Idris</h5>
                        </div>
                        <div class="col">
                          <h6>KELAS</h6>
                          <h5>11 A</h5>
                        </div>
                        <div class="col">
                          <h6>HOBI</h6>
                          <h5>Bermain Bola</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <h6 class="viisi-misi fw-bold">Visi Misi</h6>
                      <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur eveniet rerum provident quos voluptate alias enim minima consequatur ipsa illum debitis, asperiores molestiae deserunt corrupti in quae cum mollitia consectetur.</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="suara">
                        <h6 class="total-suara">500 suara</h6>
                        <div class="progress" style="width: 20%">
                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <img src="{{ asset('img/bill.jpg') }}" alt="">
                </div>
            </div>
          </div>
        </div>
    </div>
    @endsection

    
