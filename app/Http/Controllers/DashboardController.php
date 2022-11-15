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
        return view('admin.dashboard.index',[ 'title' => 'Dashboard-Admin'], compact('users', 'vote'));
    }
}
