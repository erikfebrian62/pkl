<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Visi;

class EditVisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::get();
        return view('admin.candidat.visi.index', ['tittle' => 'edit-visi-kandidat'], compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates = Candidate::get();
        return view('admin.candidat.visi.create', ['tittle' => 'Tambah-Visi-Kandidat'], compact('candidates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Visi::create([
            'visi' => $request->visi,
        ]);

        return redirect(route('admin.candidat.visi.index'))->with('succsess', 'Data berhasil di Tambahkan!');
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
        $visi = Visi::where('candidate_id', $candidates->id)->first();
        return view('admin.candidat.visi.show', ['tittle' => 'Tampilan-Visi-Kandidat'] , compact('candidates', 'visi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidates = Candidate::find($id);
        $visi = Visi::where('candidate_id', $candidates->id)->first();
       return view('admin.candidat.visi.edit', ['tittle' => 'Edit-Visi_Kandidat'], compact( 'candidates', 'visi'));
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
            'candidate_id' => 'required',
            'visi' => 'required'
        ]);

        $candidates = Candidate::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidates = Candidate::find($id);
        $candidates->delete($id);

        return redirect(route ('admin.visi.index'))->with('succsess', 'Data Telah Diperbarui!');
    }
}
