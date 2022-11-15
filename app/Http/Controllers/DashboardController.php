<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vote;

class DashboardController extends Controller
{
    public function dash()
    {
        $vote = Vote::get();
        $users = User::where('role', 'user')->get();
<<<<<<< HEAD
        $votes = Vote::all();
        return view('admin.dashboard.index',[ 'title' => 'Dashboard-Admin'], compact('users', 'votes'));
=======
        return view('admin.dashboard.index',[ 'title' => 'Dashboard-Admin'], compact('users', 'vote'));
>>>>>>> a53d06a713117066b769094df759ba9eaf91ef09
    }
}
