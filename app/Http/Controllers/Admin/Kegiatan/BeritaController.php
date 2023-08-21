<?php

namespace App\Http\Controllers\Admin\Kegiatan;

use App\Models\Admin\Kegiatan\Berita;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $berita = Berita::all(); // Mengambil semua isi tabel
        $paginate = Berita::orderBy('id', 'asc')->paginate(5);
        return view('admin.kegiatan.berita.index', ['berita' => $berita,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.berita.create');
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
            'name' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'photo' => 'required',
            'link' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Berita::create($request->all());//jika data berhasil ditambahkan, akan kembali ke halaman utama
        
        if ($request->file('photo')) {
            $photo = $request->file('photo')->store('berita', 'public');
        }
        
        //fungsi eloquent untuk menambah data
        Berita::create([
            'name' => $request-> name,
            'deskripsi' => $request-> deskripsi,
            'tanggal' => $request-> tanggal,
            'photo' => $photo,
            'link' => $request-> link,
        ]);
        return redirect('/berita')
            ->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_berita)
    {
        $berita = Berita::where('id', $id_berita)->first();
        return view('admin.kegiatan.berita.detail', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_berita)
    {
        $berita = DB::table('berita')->where('id', $id_berita)->first();
        return view('admin.kegiatan.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_berita)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'photo' => 'required',
            'link' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Berita::where('id', $id_berita)
                ->update([
                    'name' => $request-> name,
                    'deskripsi' => $request-> deskripsi,
                    'tanggal' => $request-> tanggal,
                    'photo' => $request-> photo,
                    'link' => $request-> link,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.kegiatan.berita.index')
                ->with('success', 'Berita Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_berita)
    {
        //fungsi eloquent untuk menghapus data
        Berita::where('id', $id_berita)->delete();
        return redirect('/admin/berita')
            -> with('success', 'Berita Berhasil Dihapus');       
    }
}
