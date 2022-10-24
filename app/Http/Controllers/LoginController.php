<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function proces(Request $request)
    {
        if(Auth::attempt(['nis' => $request->nis, 'password' => $request->password])) {
            if(Auth::user()->role === 'user') {
                return redirect(route('user.pilih-kandidat'));
            }else{
                return redirect(route('admin.dashboard'));
            }
        }return back()->with('Error', 'OOPS!!!');
    }
}
