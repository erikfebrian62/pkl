<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proces(Request $request)
    {
        if(Auth::attempt(['nis' => $request->nis, 'password' => $request->password])) {
            if(Auth::user()->role === 'user') {
                $vote = Vote::where('user_id', Auth::user()->id)->count();
                if($vote > 0) {
                    return redirect(route('user.informasi-suara'));
                }
                return redirect(route('user.pilih-kandidat'));
            }else{
                return redirect(route('admin.dashboard'));
            }
        }
        
        return back()->with('error', 'NIS atau Password salah!');
    }
}
