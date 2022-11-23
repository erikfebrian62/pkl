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
        $candidate = Candidate::all();
        $users = User::where('role', 'user')->get();
        $votes = Vote::all();
        $count = new Vote;
        $winner = Winner::all();
        if ($winner->isEmpty()) {
            return redirect( route('user.waiting'));
        } else{
            return view('user.informasipemenang', compact('candidate', 'users', 'votes', 'winner', 'count'));
        }
    }
}
