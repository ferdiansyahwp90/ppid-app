<?php

namespace App\Http\Controllers\Admin\Kegiatan;

use Illuminate\Support\Facades\Route;
use App\Models\Admin\Kegiatan\Galeri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $galeri = Galeri::all(); // Mengambil semua isi tabel
        $paginate = Galeri::orderBy('id', 'asc')->paginate(5);
           
        return view('admin.kegiatan.galeri.index', ['galeri' => $galeri,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requested_data = $request->all();
         
        return response()->json($requested_data);
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'photo' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Galeri::create($request->all());//jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kegiatan.galeri.index')
            ->with('success', 'galeri Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_galeri)
    {
        $galeri = Galeri::where('id', $id_galeri)->first();
        return view('kegiatan.galeri.detail', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_galeri)
    {
        $galeri = DB::table('galeri')->where('id', $id_galeri)->first();
        return view('admin.kegiatan.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_galeri)
    {
        //melakukan validasi data
        $request->validate([
            'id_galeri' => 'required',
            'name' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'photo' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Galeri::where('id', $id_galeri)
                ->update([
                    'id_galeri' => $request->id_galeri,
                    'name' => $request-> name,
                    'deskripsi' => $request-> deskripsi,
                    'tanggal' => $request-> tanggal,
                    'photo' => $request-> photo,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.kegiatan.galeri.index')
                ->with('success', 'Pengjualan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_galeri)
    {
        //fungsi eloquent untuk menghapus data
        Galeri::where('id', $id_galeri)->delete();
        return redirect('/admin/galeri')
            -> with('Success', 'Foto Berhasil Dihapus');       
    }
}
