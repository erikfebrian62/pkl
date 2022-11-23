<?php

namespace App\Http\Controllers\Admin;


use App\models\Misi;
use App\Models\Visi;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


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
        return view('admin.candidat.show', [ 'title' => 'Tampilan-Data-Kandidat' ], compact('candidate'));
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
        $candidate = Candidate::find($id);

        $request->validate([
            'ketua' => 'required',
            'kelas_ketua' => 'required',
            'jurusan_ketua' => 'required',
            'wakil' => 'required',
            'kelas_wakil' => 'required',
            'jurusan_wakil' => 'required',
        ]);


        if ($img = $request->file('img')) {
            if($request->oldimage) {
                File::delete(public_path('images/'. $candidate->img));
            }

                $request->validate([
                    'img' => 'required|file|image|mimes:jpeg,jpg,png'
                ]);
                $file = $request->file('img');
                $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $destinationPath = 'images/';
                $file->move($destinationPath, $profileImage);
                $candidate->img = $profileImage;

            }

        $candidate->ketua = $request->ketua;
        $candidate->kelas_ketua = $request->jurusan_ketua;
        $candidate->wakil = $request->wakil;
        $candidate->kelas_wakil = $request->kelas_wakil;
        $candidate->jurusan_wakil = $request->jurusan_wakil;
        $candidate->update();

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
        $candidate = Candidate::findOrFail($id);
        unlink('images/' . $candidate->img);
        Candidate::where('id', $candidate->id)->delete();

        return back()->with('success', 'Data kandidat berhasil dihapus!');
    }
}
