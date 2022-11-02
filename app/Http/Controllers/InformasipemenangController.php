<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class InformasipemenangController extends Controller
{
    public function pemenang()
    {
        // $candidate = Candidate::all();
        $candidates = Candidate::all();
        return view('user.informasipemenang', compact('candidates'));
    }
}
