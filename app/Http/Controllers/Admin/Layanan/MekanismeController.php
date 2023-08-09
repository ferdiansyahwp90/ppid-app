<?php

namespace App\Http\Controllers\Admin\Layanan;

use App\Models\Admin\Layanan\Mekanisme;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MekanismeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mekanisme = Mekanisme::all(); // Mengambil semua isi tabel
        $paginate = Mekanisme::orderBy('id', 'asc')->paginate(5);
        return view('admin.layanan.mekanisme.index', ['mekanisme' => $mekanisme,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layanan.mekanisme.create');
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
        Mekanisme::create($request->all());

        return redirect('/admin/mekanisme')
                ->with('success', 'Mekanisme Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_mekanisme)
    {
        $berita = Mekanisme::where('id', $id_mekanisme)->first();
        return view('admin.layanan.mekanisme.detail', compact('mekanisme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mekanisme)
    {
        $berita = DB::table('mekanisme')->where('id', $id_mekanisme)->first();
        return view('admin.layanan.mekanisme.edit', compact('mekanisme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mekanisme)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Mekanisme::where('id', $id_mekanisme)
                ->update([
                    'nama' => $request-> nama,
                    'file' => $request-> file,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.layanan.mekanisme.index')
                ->with('success', 'Mekanisme Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mekanisme)
    {
        //fungsi eloquent untuk menghapus data
        Mekanisme::where('id', $id_mekanisme)->delete();
        return redirect('/admin/mekanisme')  
            -> with('success', 'Mekanisme Berhasil Dihapus');       
    }
}
