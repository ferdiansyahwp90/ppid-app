<?php

namespace App\Http\Controllers\Admin\profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Profile\PPID;
use Illuminate\Support\Facades\DB;

class PPIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppid = PPID::all(); // Mengambil semua isi tabel
        $paginate = PPID::orderBy('id', 'asc')->paginate(5);
        return view('admin.profile.ppid.index', ['ppid' => $ppid,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.ppid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        
        //fungsi eloquent untuk menambah data
        PPID::create($request->all());

        return redirect('/admin-ppid')
                ->with('success', 'Seputar PPID Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_ppid)
    {
        $ppid = PPID::where('id', $id_ppid)->first();
        return view('admin.profile.ppid.index', compact('ppid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ppid)
    {
        $ppid = DB::table('seputar')->where('id', $id_ppid)->first();
        return view('admin.profile.ppid.edit', compact('ppid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ppid)
    {
        // dd('ok');
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           PPID::where('id', $id_ppid)
                ->update([
                    'deskripsi' => $request->deskripsi,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('/admin-ppid')
                ->with('success', 'Seputar PPID Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ppid)
    {
        //fungsi eloquent untuk menghapus data
        PPID::where('id', $id_ppid)->delete();
        return redirect('/admin-ppid')  
            -> with('success', 'Seputar PPID Berhasil Dihapus');       
    }
}