<?php

namespace App\Http\Controllers\Admin\DaftarInformasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Setiapsaat;
use Illuminate\Support\Facades\DB;

class SetiapsaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setiapsaat = Setiapsaat::all(); // Mengambil semua isi tabel
        $paginate = Setiapsaat::orderBy('id', 'asc')->paginate(5);
        return view('admin.daftarInformasi.setiapsaat.index', ['setiapsaat' => $setiapsaat,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftarInformasi.setiapsaat.create');
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
        Setiapsaat::create($request->all());

        return redirect('/admin-setiapsaat')
                ->with('success', 'Informasi Setiapsaat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_setiapsaat)
    {
        $setiapsaat = Setiapsaat::where('id', $id_setiapsaat)->first();
        return view('admin.daftarInformasi.setiapsaat.index', compact('setiapsaat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_setiapsaat)
    {
        $setiapsaat = DB::table('setiapsaat')->where('id', $id_setiapsaat)->first();
        return view('admin.daftarInformasi.setiapsaat.edit', compact('setiapsaat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_setiapsaat)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Setiapsaat::where('id', $id_setiapsaat)
                ->update([
                    'deskripsi' => $request-> deskripsi,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('admin-setiapsaat')
                ->with('success', 'Informasi Setiapsaat Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_setiapsaat)
    {
        //fungsi eloquent untuk menghapus data
        Setiapsaat::where('id', $id_setiapsaat)->delete();
        return redirect('/admin-setiapsaat')  
            -> with('success', 'Informasi Setiapsaat Berhasil Dihapus');       
    }
}