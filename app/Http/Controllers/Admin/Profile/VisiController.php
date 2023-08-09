<?php

namespace App\Http\Controllers\Admin\profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Profile\Visi;
use Illuminate\Support\Facades\DB;

class VisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visi = Visi::all(); // Mengambil semua isi tabel
        $paginate = Visi::orderBy('id', 'asc')->paginate(5);
        return view('admin.profile.visi.index', ['visi' => $visi,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.visi.create');
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
        Visi::create([
            'deskripsi' => $request-> deskripsi,
        ]);
        return redirect('/admin/visi')
            ->with('success', 'Visi dan Misi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_visi)
    {
        $berita = Visi::where('id', $id_visi)->first();
        return view('admin.profile.visi.detail', compact('ppid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_visi)
    {
        $berita = DB::table('ppid')->where('id', $id_visi)->first();
        return view('admin.profile.visi.edit', compact('ppid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_visi)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Visi::where('id', $id_visi)
                ->update([
                    'deskripsi' => $request-> deskripsi,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.profile.visi.index')
                ->with('success', 'Visi dan Misi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_visi)
    {
        //fungsi eloquent untuk menghapus data
        Visi::where('id', $id_visi)->delete();
        return redirect('/admin/visi')  
            -> with('success', 'Visi dan Misi Berhasil Dihapus');       
    }
}