<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasipemenangController extends Controller
{
    public function pemenang()
    {
        return view('user.informasipemenang');
    }
}
