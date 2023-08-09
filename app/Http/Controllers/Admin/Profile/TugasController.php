<?php

namespace App\Http\Controllers\Admin\profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Profile\Tugas;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas = Tugas::all(); // Mengambil semua isi tabel
        $paginate = Tugas::orderBy('id', 'asc')->paginate(5);
        return view('admin.profile.tugas.index', ['tugas' => $tugas,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.tugas.create');
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
        Tugas::create([
            'deskripsi' => $request-> deskripsi,
        ]);
        return redirect('/admin/tugas')
            ->with('success', 'Tugas dan Fungsi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_tugas)
    {
        $berita = Tugas::where('id', $id_tugas)->first();
        return view('admin.profile.tugas.detail', compact('ppid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tugas)
    {
        $berita = DB::table('ppid')->where('id', $id_tugas)->first();
        return view('admin.profile.tugas.edit', compact('ppid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tugas)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Tugas::where('id', $id_tugas)
                ->update([
                    'deskripsi' => $request-> deskripsi,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.profile.tugas.index')
                ->with('success', 'Tugas dan Fungsi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tugas)
    {
        //fungsi eloquent untuk menghapus data
        Tugas::where('id', $id_tugas)->delete();
        return redirect('/admin/tugas')  
            -> with('success', 'Tugas dan Fungsi Berhasil Dihapus');       
    }
}