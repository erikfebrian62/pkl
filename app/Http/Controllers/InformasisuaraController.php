<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class InformasisuaraController extends Controller
{
    public function suara()
    {
        $votes = Vote::where('user_id', Auth::user()->id)->get();
        $candidate = Candidate::all();
        $users = User::where('role', 'user')->get();
        $count = new Vote;
        return view('user.informasisuara', compact('users', 'candidate', 'votes', 'count'));
    }
}
