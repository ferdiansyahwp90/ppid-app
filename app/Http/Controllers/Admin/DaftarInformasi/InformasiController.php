<?php

namespace App\Http\Controllers\Admin\DaftarInformasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Informasi;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = Informasi::all(); // Mengambil semua isi tabel
        $paginate = Informasi::orderBy('id', 'asc')->paginate(5);
        return view('admin.daftarInformasi.informasi.index', ['informasi' => $informasi,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftarInformasi.informasi.create');
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
            'status' => 'required',
        ]);
        
        //fungsi eloquent untuk menambah data
        Informasi::create($request->all());

        return redirect('/admin-informasi')
                ->with('success', 'Informasi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_informasi)
    {
        $informasi = Informasi::where('id', $id_informasi)->first();
        return view('admin.daftarInformasi.informasi.detail', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_informasi)
    {
        $informasi = DB::table('informasi')->where('id', $id_informasi)->first();
        return view('admin.daftarInformasi.informasi.edit', compact('informasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_informasi)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
            'status' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Informasi::where('id', $id_informasi)
                ->update([
                    'deskripsi' => $request-> deskripsi,
                    'status' => $request-> status,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.daftarInformasi.informasi.index')
                ->with('success', 'Informasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_informasi)
    {
        //fungsi eloquent untuk menghapus data
        Informasi::where('id', $id_informasi)->delete();
        return redirect('/admin-informasi')  
            -> with('success', 'Informasi Berhasil Dihapus');       
    }
}