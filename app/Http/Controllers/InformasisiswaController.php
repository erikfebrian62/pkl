<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasisiswaController extends Controller
{
    public function siswa()
    {
        return view('user.informasisiswa');
    }
}
