<?php

namespace App\Http\Controllers\Admin\DaftarInformasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Sertamerta;
use Illuminate\Support\Facades\DB;

class SertamertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertamerta = Sertamerta::all(); // Mengambil semua isi tabel
        $paginate = Sertamerta::orderBy('id', 'asc')->paginate(5);
        return view('admin.daftarInformasi.sertamerta.index', ['sertamerta' => $sertamerta,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftarInformasi.sertamerta.create');
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
        Sertamerta::create($request->all());

        return redirect('/admin-sertamerta')
                ->with('success', 'Informasi Sertamerta Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_sertamerta)
    {
        $sertamerta = Sertamerta::where('id', $id_sertamerta)->first();
        return view('admin.daftarInformasi.sertamerta.index', compact('sertamerta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sertamerta)
    {
        $sertamerta = DB::table('sertamerta')->where('id', $id_sertamerta)->first();
        return view('admin.daftarInformasi.sertamerta.edit', compact('sertamerta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sertamerta)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Sertamerta::where('id', $id_sertamerta)
                ->update([
                    'deskripsi' => $request-> deskripsi,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('admin-sertamerta')
                ->with('success', 'Informasi Sertamerta Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sertamerta)
    {
        //fungsi eloquent untuk menghapus data
        Sertamerta::where('id', $id_sertamerta)->delete();
        return redirect('/admin-sertamerta')  
            -> with('success', 'Informasi Sertamerta Berhasil Dihapus');       
    }
}