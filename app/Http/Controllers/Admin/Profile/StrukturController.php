<?php

namespace App\Http\Controllers\Admin\profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Profile\Struktur;
use Illuminate\Support\Facades\DB;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = Struktur::all(); // Mengambil semua isi tabel
        $paginate = Struktur::orderBy('id', 'asc')->paginate(5);
        return view('admin.profile.struktur.index', ['struktur' => $struktur,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.struktur.create');
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
            'photo' => 'required',
        ]);
        
        //fungsi eloquent untuk menambah data
        Struktur::create([
            'photo'=>$request->file('photo')->move('struktur', $request->file('photo')->getClientOriginalName()),
        ]);
        return redirect('/admin-struktur')
            ->with('success', 'Struktur Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_struktur)
    {
        $struktur = Struktur::where('id', $id_struktur)->first();
        return view('admin.profile.struktur.detail', compact('struktur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_struktur)
    {
        $struktur = DB::table('struktur')->where('id', $id_struktur)->first();
        return view('admin.profile.struktur.edit', compact('struktur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_struktur)
    {
        //melakukan validasi data
        $request->validate([
            'photo' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Struktur::where('id', $id_struktur)
                ->update([
                    'photo'=>$request->file('photo')->move('struktur', $request->file('photo')->getClientOriginalName()),
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('/admin-struktur')
                ->with('success', 'Struktur Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_struktur)
    {
        //fungsi eloquent untuk menghapus data
        Struktur::where('id', $id_struktur)->delete();
        return redirect('/admin-struktur')  
            -> with('success', 'Struktur Berhasil Dihapus');       
    }
}