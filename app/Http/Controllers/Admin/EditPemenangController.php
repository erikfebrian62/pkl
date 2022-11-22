<?php

namespace App\Http\Controllers\Admin;

use App\Models\Winner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Support\Facades\File;

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
        $candidate = Candidate::withCount('vote')->orderBy('vote_count', 'desc')->first();

        $request->validate([
            'img' => 'required'
        ]);

        $file = $request->file('img');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'images/';
        $file->move($tujuan_upload, $nama_file);

        Winner::create([
            'candidate_id' => $candidate->id,
            'img' => $nama_file
        ]);

        return redirect( route('admin.pemenang.index'))->with('success', 'Data berhasil di Tambahkan!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $pemenang = Winner::find($id);
       return view('admin.pemenang.show', ['title' => 'Tampilan-Struktur'], compact('pemenang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $pemenang = Winner::find($id);
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
        $pemenang = Winner::find($id);

        $request->validate([
            'img' => 'required'
        ]);

        $input = $request->all();

        if ($img = $request->file('img')) {
            if ($request->oldImage) {
                File::delete(public_path('images/'. $pemenang->img));
            }
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = $profileImage;
        } else {
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
    public function destroy($id)
    {
        $pemenang = Winner::find($id);
        unlink('images/' . $pemenang->img);
        Winner::where('id', $pemenang->id)->delete();

        return redirect( route('admin.pemenang.index'))->with('success', 'Data telah di Hapus!.');
    }

    public function wait()
    {
        return view('nunggu');
    }
}
