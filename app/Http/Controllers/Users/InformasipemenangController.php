<?php

namespace App\Http\Controllers\Users;

use App\Models\Misi;
use App\Models\User;
use App\Models\Visi;
use App\Models\Vote;
use App\Models\Winner;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformasipemenangController extends Controller
{
    public function pemenang()
    {
        // $candidate = Candidate::all();
        $candidate = Candidate::with(['visi','misi'])->get();
        // $candidate = Candidate::findOrFail($id);
        // $data = Misi::where('candidate_id', $candidate->id)->get();
        // $visi = Visi::where('candidate_id', $candidate->id)->first();
        $users = User::where('role', 'user')->get();
        $votes = Vote::all();
        $count = new Vote;
        $winner = Winner::all();
        // dd($votes);
        return view('user.informasipemenang', compact('candidate', 'users', 'votes', 'winner', 'count'));
    }
}
