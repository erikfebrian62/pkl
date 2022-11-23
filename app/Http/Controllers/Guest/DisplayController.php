<?php

namespace App\Http\Controllers\Guest;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class DisplayController extends Controller
{
    public function display()
    {
        $votes = Vote::all();
        $candidate = Candidate::with(['visi','misi'])->get();
        $users = User::where('role', 'user');
        $count = new Vote;
        return view('display', compact('users', 'candidate', 'votes', 'count'));
    }

    public function suara()
    {
        $data = [
            'candidate' => Candidate::select('id')->withCount('vote')->get(),
            'jmlhpeserta' => User::where('role', 'user')->count(),
        ];
        return response()->json($data);
    }

   
}
