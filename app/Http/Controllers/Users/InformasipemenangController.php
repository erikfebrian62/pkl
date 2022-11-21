<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformasipemenangController extends Controller
{
    public function pemenang()
    {
        // $candidate = Candidate::all();
        $candidate = Candidate::all();
        $candidate = Candidate::with(['visi','misi'])->get();
        $users = User::where('role', 'user')->get();
        $votes = Vote::all();
        $count = new Vote;
        // $vote = Vote::with('user_id', 'candidate_id')
        //             ->orderBy(Candidate::select('candidate_id')->whereColumn('user_id', 'candidate_id'));
        return view('user.informasipemenang', compact('candidate'));
    }
}
