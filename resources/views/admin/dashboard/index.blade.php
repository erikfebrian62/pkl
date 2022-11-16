@extends('layouts.mainadmin')

@section('title')
Dasboard
@endsection

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                        <div class="stats-icon purple mb-2">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Jumlah Siswa & Siswi</h6>
                        <h5 class="font-extrabold mb-0">{{ $users->count() }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Sudah Voting</h6>
<<<<<<< HEAD
                        <h6 class="font-extrabold mb-0">{{ $votes->count() }}</h6>
=======
                        <h6 class="font-extrabold mb-0 ">{{ $vote->count() }}</h6>
>>>>>>> a53d06a713117066b769094df759ba9eaf91ef09
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                        <div class="stats-icon green mb-2">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Belum Voting</h6>
                        <h6 class="font-extrabold mb-0">80.000</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
