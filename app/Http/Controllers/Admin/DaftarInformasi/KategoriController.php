<?php

namespace App\Http\Controllers\Admin\DaftarInformasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all(); // Mengambil semua isi tabel
        $paginate = Kategori::orderBy('id', 'asc')->paginate(5);
        return view('admin.daftarInformasi.kategori.index', ['kategori' => $kategori,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftarInformasi.kategori.create');
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
            'status' => 'required',
        ]);
        
        //fungsi eloquent untuk menambah data
        Kategori::create($request->all());

        return redirect('/admin-kategori')
                ->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_kategori)
    {
        $kategori = Kategori::where('id', $id_kategori)->first();
        return view('admin.daftarInformasi.kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $kategori = DB::table('kategori')->where('id', $id_kategori)->first();
        return view('admin.daftarInformasi.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Kategori::where('id', $id_kategori)
                ->update([
                    'nama' => $request-> nama,
                    'status' => $request-> status,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.daftarInformasi.kategori.index')
                ->with('success', 'Kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        //fungsi eloquent untuk menghapus data
        Kategori::where('id', $id_kategori)->delete();
        return redirect('/admin/kategori')  
            -> with('success', 'Laporan Yang kategori Berhasil Dihapus');       
    }
}