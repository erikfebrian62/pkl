<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InformasibiodataController extends Controller
{

    public function search(Request $request)
    {
        if($request->has('search')) {
            $users = User::where('nis', 'LIKE', '%' .$request->search. '%')
            ->orWhere('name', 'LIKE', '%' .$request->search. '%')
            ->orWhere('class', 'LIKE', '%' .$request->search. '%')
            ->orWhere('jurusan', 'LIKE', '%' .$request->search. '%')->get();
        }else{
            $users = User::all();
        }

        return view('admin.biodata.index',[ 'title' => 'Informasi-Data-Siswa'], compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('role', 'user')->paginate(10);
        return view('admin.biodata.index',[ 'title' => 'Informasi-Data-Siswa' ],compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.biodata.create', [ 'title' => 'Tambah-Data-Siswa' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'role' => 'user',
            'nis' => $request->nis,
            'name' => $request->name,
            'class' => $request->class,
            'jurusan' => $request->jurusan,
            'password' => bcrypt($request->password)
        ]);

        return redirect(route('admin.biodata.index'))->with('success', 'Data berhasil di Tambahkan!.');
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
        $users = User::find($id);
        return view('admin.biodata.edit', [ 'title' => 'Edit-Data-Siswa' ], compact('users'));
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

        $user = User::find($id);
        $user->nis = $request->nis;
        $user->name = $request->name;
        $user->class = $request->class;
        $user->jurusan = $request->jurusan;
        $user->save();

        return redirect(route('admin.biodata.index'))->with('success', 'Data telah di Perbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect(route('admin.biodata.index'))->with('success', 'Data telah di Hapus!.');
    }
}
