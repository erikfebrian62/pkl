<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dash()
    {
        $vote = Vote::get();
        $users = User::where('role', 'user')->get();
        $votes = Vote::all();
        return view('admin.dashboard.index',[ 'title' => 'Dashboard-Admin'], compact('users', 'votes'));
    }
}
