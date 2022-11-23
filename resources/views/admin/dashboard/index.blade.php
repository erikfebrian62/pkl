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
                        <h6 class="font-extrabold mb-0">{{ $votes->count() }}</h6>
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
                    @php
                        $total = $users->count()
                    @endphp
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Belum Voting</h6>
                        <h6 class="font-extrabold mb-0">{{ $total-$votes->count() }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($candidates as $item)
    <div class="col-sm-4">
        <div class="card">
            <div class="text-center fw-bold h1 mt-1">{{ $loop->iteration }}</div>
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <img src="{{ asset('images/'. $item->img) }}" class="card-img-top" alt="">
                </div>
                @php
                    $suara=$votes->where('candidate_id', $item->id)->count()
                @endphp
                <div class="row">
                    <div class="col">
                        <div class="suara">
                            @php
                                $suara=$votes->where('candidate_id', $item->id)->count()
                            @endphp
                            <div class="d-inline-flex">
                                <h6 id="suara_{{ $item->id}}">{{ $suara }}</h6>
                                <h6 class="mx-1">Suara</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col" >
                        <h6 style="float:right">Total dari {{ $users->count() }} murid</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
