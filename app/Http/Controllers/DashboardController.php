<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dash()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.dashboard.index',[ 'title' => 'Dashboard-Admin'], compact('users'));
    }
}
