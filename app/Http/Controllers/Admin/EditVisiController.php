<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visi;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.candidat.visi.index', ['title' => 'edit-visi-kandidat'], compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates = Candidate::get();
        return view('admin.candidat.visi.create', ['title' => 'Tambah-Visi-Kandidat'], compact('candidates'));
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
            'visi' => 'required'
        ]);

        Visi::create([
            'candidate_id' => $request->candidate,
            'visi' => $request->visi
        ]);

        return redirect(route('admin.kandidat.visi.index'))->with('succsess', 'Data berhasil di Tambahkan!');
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
        return view('admin.candidat.visi.show', ['title' => 'Tampilan-Visi-Kandidat'] , compact('candidates', 'visi'));
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
       return view('admin.candidat.visi.edit', ['title' => 'Edit-Visi_Kandidat'], compact( 'candidates', 'visi'));
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
            'visi' => 'required'
        ]);

        $candidates = Candidate::find($id);
        $candidates->visi = $request->visi;
        $candidates->update;
        return redirect(route('admin.kandidat.visi.index'))->with('succsess', 'Visi Berhasil Di Edit!.');
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

        return redirect(route ('admin.kandidat.visi.index'))->with('succsess', 'Data Telah Diperbarui!');
    }
}
