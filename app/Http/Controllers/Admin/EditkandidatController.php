<?php

namespace App\Http\Controllers\Admin;


use App\models\Misi;
use App\Models\Visi;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EditkandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visi = Visi::all();
        $candidate = Candidate::all();
        return view('admin.candidat.index',[ 'title' => 'Informasi-Biodata-Kandidat' ],compact('candidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidat.create', [ 'title' => 'Tambah-Data-Kandidat' ]);
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
            'img' => 'required',
            'ketua' => 'required',
            'kelas_ketua' => 'required',
            'jurusan_ketua' => 'required',
            'wakil' => 'required',
            'kelas_wakil' => 'required',
            'jurusan_wakil' => 'required',
        ]);

        $input = $request->all();

        if ($img = $request->file('img')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = $profileImage;
        }

        Candidate::create($input);

        return redirect(route('admin.kandidat.index'))->with('success', 'Data berhasil di Tambahkan!.');
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
        $data = Misi::where('candidate_id', $candidate->id)->first();
        $visi = Visi::where('candidate_id', $candidate->id)->first();
        return view('admin.candidat.show', [ 'title' => 'Tampilan-Data-Kandidat' ], compact('candidate', 'data', 'visi'));
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
        return view('admin.candidat.edit', [ 'title' => 'Edit-Data-Kandidat' ],compact('candidate'));
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
            'img' => 'required',
            'ketua' => 'required',
            'kelas_ketua' => 'required',
            'jurusan_ketua' => 'required',
            'wakil' => 'required',
            'kelas_wakil' => 'required',
            'jurusan_wakil' => 'required',
        ]);

        $input = $request->all();

        if ($img = $request->file('img')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destinationPath, $profileImage);
            $input['img'] = $profileImage;
        }else{
            unset($input['img']);
        }

        Candidate::find($id)->update($input);

        return redirect(route('admin.kandidat.index'))->with('success', 'Data telah di Perbarui!.');
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
        $candidate->delete($id);

        return redirect(route('admin.kandidat.index'))->with('success', 'Data telah di Hapus!.');
    }
}
