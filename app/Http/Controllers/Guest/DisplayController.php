<?php

namespace App\Http\Controllers\Guest;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisplayController extends Controller
{
    public function display()
    {
        $votes = Vote::all();
        $candidate = Candidate::all();
        $users = User::all();
        $count = new Vote;
        return view('display', compact('users', 'candidate', 'votes', 'count'));
    }
}
