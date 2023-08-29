<?php

namespace App\Http\Controllers\Admin\Kegiatan;

use Illuminate\Support\Facades\Route;
use App\Models\Admin\Kegiatan\Galeri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::all(); // Mengambil semua isi tabel
        $paginate = Galeri::orderBy('id', 'asc')->paginate(5);
<<<<<<< HEAD:app/Http/Controllers/GaleriController.php

        return view('admin.kegiatan.galeri.index', ['galeri' => $galeri, 'paginate' => $paginate]);
=======
        // dd($galeri->toArray());
        return view('admin.kegiatan.galeri.index', ['galeri' => $galeri,'paginate'=>$paginate]);
>>>>>>> d6be4d77fa9d3cd69aa48afb0dcb6f4a21c6504a:app/Http/Controllers/Admin/Kegiatan/GaleriController.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kegiatan.galeri.create');
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
        $validate = $request->validate([
            'name'=>'required|max:255',
            'deskripsi'=>'required',
            'tanggal'=>'required',
            'photo'=>'required',
        ]);
        if ($request->file('photo')) {
            $validate['photo'] = $request->file('photo')->store('galeri', 'public');
        }
        //fungsi eloquent untuk menambah data
        Galeri::create([
            'name'=>$request->name,
            'deskripsi'=>$request->deskripsi,
            'tanggal'=>$request->tanggal,
            'photo'=>$request->file('photo')->move('galeri', $request->file('photo')->getClientOriginalName()),
        ]);
<<<<<<< HEAD:app/Http/Controllers/GaleriController.php
        return redirect()->route('galeri.index')
            ->with('success', 'galeri Berhasil Ditambahkan');
        return redirect('/galeri')->with('status', "Data '" . $request->nama . "' berhasil ditambahkan"); //jika data berhasil ditambahkan, akan kembali ke halaman utama
=======
        return redirect('/admin-galeri')->with('status', "Data '" . $request->name . "' berhasil ditambahkan");//jika data berhasil ditambahkan, akan kembali ke halaman utama
>>>>>>> d6be4d77fa9d3cd69aa48afb0dcb6f4a21c6504a:app/Http/Controllers/Admin/Kegiatan/GaleriController.php
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_galeri)
    {
        $galeri = Galeri::where('id', $id_galeri)->first();
        return view('admin.kegiatan.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_galeri)
    {
        $galeri = DB::table('galeri')->where('id', $id_galeri)->first();
        return view('admin.kegiatan.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_galeri)
    {
        //melakukan validasi data
        $request->validate([
            'name'=>'required',
            'deskripsi'=>'required',
            'tanggal'=>'required',
            'photo'=>'required',
        ]);

        // if ($id_galeri->photo != null) Galeri::delete($id_galeri->image);
        //fungsi eloquent untuk mengupdate data inputan kita
<<<<<<< HEAD:app/Http/Controllers/GaleriController.php
        Galeri::where('id', $id_galeri)
            ->update([
                'id_galeri' => $request->id_galeri,
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'photo' => $request->photo,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('admin.kegiatan.galeri.index')
            ->with('success', 'Pengjualan Berhasil Diupdate');
=======
           Galeri::where('id', $id_galeri)
                ->update([
                    // 'id_galeri'=>$request->id_galeri,
                    'name'=>$request->name,
                    'deskripsi'=>$request->deskripsi,
                    'tanggal'=>$request->tanggal,
                    'photo'=>$request->file('photo')->move('galeri', $request->file('photo')->getClientOriginalName()),
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('/admin-galeri')
                ->with('success', 'Galeri Berhasil Diupdate');
>>>>>>> d6be4d77fa9d3cd69aa48afb0dcb6f4a21c6504a:app/Http/Controllers/Admin/Kegiatan/GaleriController.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_galeri)
    {
        //fungsi eloquent untuk menghapus data
        Galeri::where('id', $id_galeri)->delete();
<<<<<<< HEAD:app/Http/Controllers/GaleriController.php
        return redirect('/galeri')
            ->with('Success', 'Foto Berhasil Dihapus');
=======
        return redirect('/admin-galeri')
            -> with('Success', 'Foto Berhasil Dihapus');       
>>>>>>> d6be4d77fa9d3cd69aa48afb0dcb6f4a21c6504a:app/Http/Controllers/Admin/Kegiatan/GaleriController.php
    }
}
