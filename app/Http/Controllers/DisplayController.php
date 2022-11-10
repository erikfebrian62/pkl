<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Vote;

class DisplayController extends Controller
{
    public function display()
    {
        $votes = Vote::all();
        $candidate = Candidate::all();
        $users = User::all();
        $count = new Vote;
        return view('user.informasisuara', compact('users', 'candidate', 'votes', 'count'));
    }
}
