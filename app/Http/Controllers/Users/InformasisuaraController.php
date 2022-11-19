<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Vote;
use App\Models\Candidate;
use App\Http\Controllers\Controller;
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

    public function hasil()
    {
        $data = [
            'candidate' => Candidate::select('id')->withCount('vote')->get(),
            'jmlhpeserta' => User::where('role', 'user')->count(),
        ];
        return response()->json($data);
    }
}
