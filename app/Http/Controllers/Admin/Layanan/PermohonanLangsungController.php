<?php

namespace App\Http\Controllers\Admin\Layanan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Layanan\PermohonanLangsung;
use Illuminate\Support\Facades\DB;

class PermohonanLangsungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permohonanLangsung = PermohonanLangsung::all(); // Mengambil semua isi tabel
        $paginate = PermohonanLangsung::orderBy('id', 'asc')->paginate(5);
        return view('admin.layanan.permohonan_Langsung.index', ['permohonanLangsung' => $permohonanLangsung,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.layanan.permohonan_Langsung.create'); 
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
        PermohonanLangsung::create($request->all());

        return redirect('/admin/permohonanLangsung')
                ->with('success', 'Permohonan Langsung Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_permohonanLangsung)
    {
        $berita = PermohonanLangsung::where('id', $id_permohonanLangsung)->first();
        return view('admin.layanan.permohonan_Langsung.detail', compact('permohonanLangsung'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_permohonanLangsung)
    {
        $berita = DB::table('permohonanLangsung')->where('id', $id_permohonanLangsung)->first();
        return view('admin.layanan.permohonan_Langsung.edit', compact('permohonanLangsung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_permohonanLangsung)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           PermohonanLangsung::where('id', $id_permohonanLangsung)
                ->update([
                    'nama' => $request-> nama,
                    'file' => $request-> file,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.layanan.permohonan_Langsung.index')
                ->with('success', 'Permohonan Langsung Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_permohonanLangsung)
    {
        //fungsi eloquent untuk menghapus data
        PermohonanLangsung::where('id', $id_permohonanLangsung)->delete();
        return redirect('/admin/permohonanLangsung')  
            -> with('success', 'Permohonan Langsung Berhasil Dihapus');       
    }
}
