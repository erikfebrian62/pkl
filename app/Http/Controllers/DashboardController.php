<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vote;

class DashboardController extends Controller
{
    public function dash()
    {
        $users = User::where('role', 'user')->get();
        $votes = Vote::all();
        return view('admin.dashboard.index',[ 'title' => 'Dashboard-Admin'], compact('users', 'votes'));
    }
}
