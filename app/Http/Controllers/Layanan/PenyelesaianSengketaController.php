<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\PenyelesaianSengketa;
use Illuminate\Support\Facades\DB;

class PenyelesaianSengketaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyelesaianSengketa = PenyelesaianSengketa::all(); // Mengambil semua isi tabel
        $paginate = PenyelesaianSengketa::orderBy('id', 'asc')->paginate(5);
        return view('admin.layanan.penyelesaian_Sengketa.index', ['penyelesaianSengketa' => $penyelesaianSengketa,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.penyelesaian_Sengketa.create');
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
        PenyelesaianSengketa::create($request->all());

        return redirect('/admin/penyelesaianSengketa')
                ->with('success', 'Penyelesaian Sengketa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_penyelesaianSengketa)
    {
        $berita = PenyelesaianSengketa::where('id', $id_penyelesaianSengketa)->first();
        return view('admin.layanan.penyelesaian_Sengketa.detail', compact('penyelesaianSengketa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_penyelesaianSengketa)
    {
        $berita = DB::table('penyelesaianSengketa')->where('id', $id_penyelesaianSengketa)->first();
        return view('admin.layanan.penyelesaian_Sengketa.edit', compact('penyelesaianSengketa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_penyelesaianSengketa)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           PenyelesaianSengketa::where('id', $id_penyelesaianSengketa)
                ->update([
                    'nama' => $request-> nama,
                    'file' => $request-> file,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.layanan.penyelesaian_Sengketa.index')
                ->with('success', 'Penyelesaian Sengketa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_penyelesaianSengketa)
    {
        //fungsi eloquent untuk menghapus data
        PenyelesaianSengketa::where('id', $id_penyelesaianSengketa)->delete();
        return redirect('/admin/penyelesaianSengketa')  
            -> with('success', 'Penyelesaian Sengketa Berhasil Dihapus');       
    }
}
