<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dash()
    {
        $users = User::all();
        return view('admin.dashboard.index', compact('users'));
    }
}
