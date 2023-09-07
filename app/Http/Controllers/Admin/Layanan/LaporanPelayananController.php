<?php

namespace App\Http\Controllers\Admin\Layanan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Layanan\LaporanPelayanan;
use Illuminate\Support\Facades\DB;

class LaporanPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporanPelayanan = LaporanPelayanan::all(); // Mengambil semua isi tabel
        $paginate = LaporanPelayanan::orderBy('id', 'asc')->paginate(5);
        return view('admin.layanan.laporan_Pelayanan.index', ['laporanPelayanan' => $laporanPelayanan,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.laporan_Pelayanan.create');
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
        ]);
        
        //fungsi eloquent untuk menambah data
        LaporanPelayanan::create($request->all());

        return redirect('/admin-laporanPelayanan')
                ->with('success', 'Laporan Pelayanan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_laporanPelayanan)
    {
        $laporanPelayanan = LaporanPelayanan::where('id', $id_laporanPelayanan)->first();
        return view('admin.layanan.laporan_Pelayanan.index', compact('laporan_Pelayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_laporanPelayanan)
    {
        $laporanPelayanan = DB::table('laporan_pelayanan')->where('id', $id_laporanPelayanan)->first();
        return view('admin.layanan.laporan_Pelayanan.edit', compact('laporanPelayanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_laporanPelayanan)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           LaporanPelayanan::where('id', $id_laporanPelayanan)
                ->update([
                    'nama' => $request-> nama,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('admin-laporanPelayanan')
                ->with('success', 'Laporan Pelayanan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_laporanPelayanan)
    {
        //fungsi eloquent untuk menghapus data
        LaporanPelayanan::where('id', $id_laporanPelayanan)->delete();
        return redirect('/admin-laporanPelayanan')  
            -> with('success', 'Laporan Pelayanan Berhasil Dihapus');       
    }
}
