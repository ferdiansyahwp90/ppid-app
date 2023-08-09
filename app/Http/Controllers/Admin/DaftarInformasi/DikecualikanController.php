<?php

namespace App\Http\Controllers\Admin\DaftarInformasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Dikecualikan;
use Illuminate\Support\Facades\DB;

class DikecualikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dikecualikan = Dikecualikan::all(); // Mengambil semua isi tabel
        $paginate = Dikecualikan::orderBy('id', 'asc')->paginate(5);
        return view('admin.daftarInformasi.dikecualikan.index', ['dikecualikan' => $dikecualikan,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftarInformasi.dikecualikan.create');
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
        Dikecualikan::create($request->all());

        return redirect('/admin/dikecualikan')
                ->with('success', 'Laporan Yang Dikecualikan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_dikecualikan)
    {
        $berita = Dikecualikan::where('id', $id_dikecualikan)->first();
        return view('admin.daftarInformasi.dikecualikan.detail', compact('dikecualikan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_dikecualikan)
    {
        $berita = DB::table('dikecualikan')->where('id', $id_dikecualikan)->first();
        return view('admin.daftarInformasi.dikecualikan.edit', compact('dikecualikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dikecualikan)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Dikecualikan::where('id', $id_dikecualikan)
                ->update([
                    'nama' => $request-> nama,
                    'file' => $request-> file,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.daftarInformasi.dikecualikan.index')
                ->with('success', 'Laporan Yang Dikecualikan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dikecualikan)
    {
        //fungsi eloquent untuk menghapus data
        Dikecualikan::where('id', $id_dikecualikan)->delete();
        return redirect('/admin/dikecualikan')  
            -> with('success', 'Laporan Yang Dikecualikan Berhasil Dihapus');       
    }
}