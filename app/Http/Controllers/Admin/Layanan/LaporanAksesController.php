<?php

namespace App\Http\Controllers\Admin\Layanan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Layanan\LaporanAkses;
use Illuminate\Support\Facades\DB;

class LaporanAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporanAkses = LaporanAkses::all(); // Mengambil semua isi tabel
        $paginate = LaporanAkses::orderBy('id', 'asc')->paginate(5);
        return view('admin.layanan.laporan_Akses.index', ['laporanAkses' => $laporanAkses,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.laporan_Akses.create');
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
        LaporanAkses::create($request->all());

        return redirect('/admin/laporan_Akses')
                ->with('success', 'Laporan Akses Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_laporanAkses)
    {
        $berita = LaporanAkses::where('id', $id_laporanAkses)->first();
        return view('admin.layanan.laporan_Akses.detail', compact('laporan_Akses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_laporanAkses)
    {
        $berita = DB::table('laporan_akses')->where('id', $id_laporanAkses)->first();
        return view('admin.layanan.laporan_Akses.edit', compact('laporan_akses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_laporanAkses)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           LaporanAkses::where('id', $id_laporanAkses)
                ->update([
                    'nama' => $request-> nama,
                    'file' => $request-> file,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.layanan.laporan_Akses.index')
                ->with('success', 'Laporan Akses Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_laporanAkses)
    {
        //fungsi eloquent untuk menghapus data
        LaporanAkses::where('id', $id_laporanAkses)->delete();
        return redirect('/admin/laporan_Akses')  
            -> with('success', 'Laporan Akses Berhasil Dihapus');       
    }
}
