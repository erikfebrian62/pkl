<?php

namespace App\Http\Controllers\Admin;

use App\Models\Misi;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::get();
        return view('admin.candidat.misi.index', ['title' => 'Edit-Misi-Kandidat'], compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates = Candidate::get();
        return view('admin.candidat.misi.create', ['title' => 'Tambah-Misi-Kandidat'], compact('candidates'));
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
            'candidate' => 'required',
            'misi' => 'required'
        ]);

        Misi::create([
            'candidate_id' => $request->candidate,
            'misi' => $request->misi
        ]);

        return redirect(route('admin.kandidat.misi.index'))->with('success', 'Data Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        $misis = Misi::where('candidate_id', $candidate->id)->get();
        return view('admin.candidat.misi.show', ['title' => 'Tampilan-Misi-Kandidat'], compact('candidate', 'misis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($candidate, $id)
    {
        $candidate = Candidate::find($candidate);
        $misi = Misi::find($id);
        return view('admin.candidat.misi.edit', ['title' => 'Edit-Misi-Kandidat'], compact( 'misi', 'candidate'));
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
            'misi' => 'required'
        ]);

        $candidates = Misi::find($id);
        $candidates->misi = $request->misi;
        $candidates->save();

        return redirect(route('admin.kandidat.misi.index'))->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $misi = Misi::find($id);
       $misi->delete();

       return back()->with('success', 'Data Telah Diperbaharui!');
    }
}
