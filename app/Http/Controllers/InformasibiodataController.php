<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Biodata;

class InformasibiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = Biodata::all();
        return view('admin.biodata.index',compact('biodata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.biodata.create');
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
            'nis' => 'required',
            'name' => 'required',
            'class' => 'required',
            'jurusan' => 'required'
        ]);

        $biodata = new Biodata;
        $biodata->nis = $request->nis;
        $biodata->name = $request->name;
        $biodata->class = $request->class;
        $biodata->jurusan = $request->jurusan;
        $biodata->save();

        return redirect(route('admin.biodata.index'))->with('Success', 'Data berhasil di Tambahkan!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biodata = Biodata::find($id);
        return view('admin.biodata.edit', compact('biodata'));
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
            'nis' => 'required',
            'name' => 'required',
            'class' => 'required',
            'jurusan' => 'required'
        ]);

        $biodata = Biodata::find($id);
        $biodata->nis = $request->nis;
        $biodata->name = $request->name;
        $biodata->class = $request->class;
        $biodata->jurusan = $request->jurusan;
        $biodata->save();

        return redirect(route('admin.biodata.index'))->with('Success', 'Data telah di Perbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata = Biodata::find($id);
        $biodata->delete();

        return redirect(route('admin.biodata.index'))->with('Success', 'Data telah di Hapus!.');
    }
}
