<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasibiodataController extends Controller
{
    public function biodata()
    {
        return view('admin.informasibiodata', [
            'title' => 'Informasi-Biodata'
        ]);
    }
}
