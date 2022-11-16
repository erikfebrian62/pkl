<?php

namespace App\Http\Controllers\Users;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformasipemenangController extends Controller
{
    public function pemenang()
    {
        // $candidate = Candidate::all();
        $candidates = Candidate::all();
        return view('user.informasipemenang', compact('candidates'));
    }
}
