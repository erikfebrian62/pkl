<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasisuaraController extends Controller
{
    public function suara()
    {
        return view('user.informasisuara');
    }
}
