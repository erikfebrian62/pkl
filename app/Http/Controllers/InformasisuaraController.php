<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidate;

class InformasisuaraController extends Controller
{
    public function suara()
    {
        $candidate = Candidate::all();
        $users = User::where('role', 'user')->get();
        return view('user.informasisuara', compact('users', 'candidate'));
    }
}
