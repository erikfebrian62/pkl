<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class EditkandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidate = Candidate::all();
        return view('admin.candidat.index', compact('candidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidat.create');
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
            'ketua' => 'required',
            'wakil' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $candidate = new Candidate;
        $candidate->ketua = $request->ketua;
        $candidate->wakil = $request->wakil;
        $candidate->kelas = $request->kelas;
        $candidate->jurusan = $request->jurusan;
        $candidate->visi = $request->visi;
        $candidate->misi = $request->misi;
        $candidate->save();

        return redirect(route('admin.kandidat.index'))->with('Success', 'Data berhasil di Tambahkan!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        return view('admin.candidat.edit', compact('candidate'));
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
            'image' => 'required',
            'ketua' => 'required',
            'wakil' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $candidate = Candidate::find($id);
        $candidate->image = $request->image;
        $candidate->ketua = $request->ketua;
        $candidate->wakil = $request->wakil;
        $candidate->kelas = $request->kelas;
        $candidate->jurusan = $request->jurusan;
        $candidate->visi = $request->visi;
        $candidate->misi = $request->misi;
        $candidate->save();

        return redirect(route('admin.kandidat.index'))->with('Success', 'Data berhasil di Perbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        $candidate->delete();

        return redirect(route('admin.kandidat.index'))->with('Success', 'Data berhasil di Hapus!.');
    }
}
