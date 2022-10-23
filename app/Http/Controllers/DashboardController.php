<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
