<?php

namespace App\Http\Controllers\Admin;

use App\Models\Misi;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Database\Seeders\CandidateSeeder;

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
        return view('admin.candidat.misi.index', ['tittle' => 'Edit-Misi-Kandidat'], compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates = Candidate::get();
        return view('admin.candidat.misi.create', ['tittle' => 'Tambah-Misi-Kandidat'], compact('candidates'));
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
        $candidates = Candidate::findOrFail($id);
        $misi = Misi::where('candidate_id', $candidates->id)->get();
        return view('admin.candidat.misi.show', ['tittle' => 'Tampilan-Misi-Kandidat'], compact('candidates', 'misi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidates = Candidate::findOrFail($id);
        $misi = Misi::where('candidate_id', $candidates->id)->get();
        return view('admin.candidat.misi.edit', ['tittle' => 'Edit-Misi-Kandidat'], compact('candidates', 'misi'));
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

        $candidates = Candidate::find($id);
        $candidates->misi=$request->misi;
        $candidates->update();

        return redirect(route('admin.candidat.misi.index'))->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $candidates = Candidate::get();
       $candidates->delete($id);

       return redirect(route('admin.candidat.misi.index'))->with('success', 'Data Telah Diperbaharui!');
    }
}
