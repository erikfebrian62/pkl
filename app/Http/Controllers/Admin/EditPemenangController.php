<?php

namespace App\Http\Controllers\Admin;

use App\Models\Winner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class EditPemenangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pemenang = Winner::all();
        return view('admin.pemenang.index', ['title' => 'informasi-struktur'], compact('pemenang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemenang.create', ['title' => 'Menambahkan-struktur']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required'
        ]);

        $input = $request->all();

        if ($img = $request->file('img')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }

        Winner::create($input);
        return redirect( route('admin.pemenang.index'))->with('success', 'Data berhasil di Tambahkan!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       $pemenang = Winner::first();
       return view('admin.pemenang.show', ['title' => 'Tampilan-Struktur'], compact('pemenang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       $pemenang = Winner::first();
       return view('admin.pemenang.edit', ['title' => 'Edit-Struktur'], compact('pemenang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'img' => 'required'
        ]);

        $input = $request->all();

        if ($img = $request->file('img')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }else{
            unset($input['img']);
        }

        Winner::findOrFail($id)->update($input);

        return redirect( route('admin.pemenang.index'))->with('success', 'Data telah di Perbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $pemenang = Winner::first();
        $pemenang->delete();

        return redirect( route('admin.pemenang.index'))->with('success', 'Data telah di Hapus!.');
    }
}
