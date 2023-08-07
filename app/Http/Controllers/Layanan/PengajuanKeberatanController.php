<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\PengajuanKeberatan;
use Illuminate\Support\Facades\DB;

class PengajuanKeberatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuanKeberatan = PengajuanKeberatan::all(); // Mengambil semua isi tabel
        $paginate = PengajuanKeberatan::orderBy('id', 'asc')->paginate(5);
        return view('admin.layanan.pengajuan_Keberatan.index', ['pengajuan_keberatan' => $pengajuanKeberatan,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.pengajuan_Keberatan.create');
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
            'nama' => 'required',
            'file' => 'required',
        ]);
        
        //fungsi eloquent untuk menambah data
        PengajuanKeberatan::create($request->all());

        return redirect('/admin/pengajuanKeberatan')
                ->with('success', 'Pengajuan Keberatan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_pengajuanKeberatan)
    {
        $berita = PengajuanKeberatan::where('id', $id_pengajuanKeberatan)->first();
        return view('admin.layanan.pengajuan_Keberatan.detail', compact('pengajuan_keberatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pengajuanKeberatan)
    {
        $berita = DB::table('pengajuan_keberatan')->where('id', $id_pengajuanKeberatan)->first();
        return view('admin.layanan.pengajuan_Keberatan.edit', compact('pengajuan_keberatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengajuanKeberatan)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           PengajuanKeberatan::where('id', $id_pengajuanKeberatan)
                ->update([
                    'nama' => $request-> nama,
                    'file' => $request-> file,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.layanan.pengajuan_Keberatan.index')
                ->with('success', 'Pengajuan Keberatan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengajuanKeberatan)
    {
        //fungsi eloquent untuk menghapus data
        PengajuanKeberatan::where('id', $id_pengajuanKeberatan)->delete();
        return redirect('/admin/pengajuanKeberatan')  
            -> with('success', 'Pengajuan Keberatan Berhasil Dihapus');       
    }
}
