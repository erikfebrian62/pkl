<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class PilihkandidatController extends Controller
{
    public function voting()
    {
        $candidate = Candidate::all();
        return view('user.pilihkandidat', [
            'title' => 'Pilih-Kandidat',
            'candidate' => $candidate
        ]);
    }
}
