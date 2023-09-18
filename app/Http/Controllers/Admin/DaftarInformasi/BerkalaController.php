<?php

namespace App\Http\Controllers\Admin\DaftarInformasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Berkala;
use Illuminate\Support\Facades\DB;

class BerkalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkala = Berkala::all(); // Mengambil semua isi tabel
        $paginate = Berkala::orderBy('id', 'asc')->paginate(5);
        return view('admin.daftarInformasi.berkala.index', ['berkala' => $berkala,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftarInformasi.berkala.create');
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
        Berkala::create($request->all());

        return redirect('/admin-berkala')
                ->with('success', 'Informasi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_berkala)
    {
        $berkala = Berkala::where('id', $id_berkala)->first();
        return view('admin.daftarInformasi.berkala.index', compact('berkala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_berkala)
    {
        $berkala = DB::table('berkala')->where('id', $id_berkala)->first();
        return view('admin.daftarInformasi.berkala.edit', compact('berkala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_berkala)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Berkala::where('id', $id_berkala)
                ->update([
                    'deskripsi' => $request-> deskripsi,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('admin-berkala')
                ->with('success', 'Informasi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_berkala)
    {
        //fungsi eloquent untuk menghapus data
        Berkala::where('id', $id_berkala)->delete();
        return redirect('/admin-berkala')  
            -> with('success', 'Informasi Berkala Berhasil Dihapus');       
    }
}