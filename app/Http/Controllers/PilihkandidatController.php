<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class PilihkandidatController extends Controller
{
    public function voting()
    {
        $candidate = Candidate::all();
        $votes = Vote::where('user_id', Auth::user()->id)->count();
        return view('user.pilihkandidat', compact('candidate', 'votes'));
    }

    public function vote($id)
    {
        $votes = Vote::where('user_id', Auth::user()->id)->count();
        if($votes < 1){
            Vote::create([
                'user_id' => Auth::user()->id,
                'candidate_id' => $id
            ]);

            return redirect(route('user.informasi-suara'));
        }

        return redirect(route('user.pilih-kandidat'))->with('Error' , 'Anda Telah Memvoting');
    }
}
