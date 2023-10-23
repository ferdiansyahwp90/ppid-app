<?php

namespace App\Http\Controllers\Pemohon;

use Illuminate\Support\Facades\Route;
use App\Models\Pemohon\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    public function index()
    {

        $permintaan = Permintaan::query(); // Mengambil semua isi tabel
        if(auth()->user()->role_id != 1){
            $permintaan->where('created_by', auth()->user()->id);
        }
        $permintaan = $permintaan->get();
        $paginate = Permintaan::orderBy('id', 'asc')->paginate(3);
        $url = 'admin-pemohon-permintaan/';
        return view('pemohon.layanan.permintaan.index', ['permintaan' => $permintaan, 'paginate' => $paginate, 'url' => $url]);
    }

    public function create()
    {
        return view('pemohon.layanan.permintaan.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        //melakukan validasi data
        $request->validate([
            'nama' => 'required |max:255',
            'noidentitas' => 'required',
            'pekerjaan' => 'required',
            'notelp' => 'required',
            'email' => 'required',
            'detailinfo' => 'required'
        ]);

        //fungsi eloquent untuk menambah data
        // Permintaan::create($request->all()); //jika data berhasil ditambahkan, akan kembali ke halaman utama


        //fungsi eloquent untuk menambah data
        Permintaan::create([
            'nama' => $request->nama,
            'noidentitas' => $request->noidentitas,
            'pekerjaan' => $request->pekerjaan,
            'notelp' => $request->notelp,
            'email' => $request->email,
            'detailinfo' => $request->detailinfo,
            'created_by' => auth()->user()->id
        ]);
        return redirect('/pemohon-permintaan')->with('status', "Data '" . $request->name . "' berhasil ditambahkan"); //jika data berhasil ditambahkan, akan kembali ke halaman utama
    }


    public function show($id_permintaan)
    {
        $permintaan = Permintaan::where('id', $id_permintaan)->first();
        return view('pemohon.layanan.permintaan.index', compact('permintaan'));
    }

    public function edit($id_permintaan)
    {
        $permintaan = DB::table('permintaan')->where('id', $id_permintaan)->first();
        return view('pemohon.layanan.permintaan.edit', compact('permintaan'));
    }

    public function updateStatus(Request $request, $id_permintaan){
        $permintaan = Permintaan::where('id', $id_permintaan)
            ->update([
                'status' => $request->status,
            ]);
        return redirect('/admin-pemohon-permintaan')->with('status', "Data '" . $request->name . "' berhasil diuodate");
    }

    public function update(Request $request, $id_permintaan)
    {

        //dd($request->all());
        //melakukan validasi data
        $request->validate([
            'nama' => 'required |max:255',
            'noidentitas' => 'required',
            'pekerjaan' => 'required',
            'notelp' => 'required',
            'email' => 'required',
            'detailinfo' => 'required'
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita

        Permintaan::where('id', $id_permintaan)
            ->update([
                'nama' => $request->nama,
                'noidentitas' => $request->noidentitas,
                'pekerjaan' => $request->pekerjaan,
                'notelp' => $request->notelp,
                'email' => $request->email,
                'detailinfo' => $request->detailinfo,
            ]);
        return redirect('/pemohon-permintaan')->with('status', "Data '" . $request->name . "' berhasil diuodate");
        //jika data berhasil diupdate, akan kembali ke halaman utama
        // return redirect()->route('/pemohon-permintaan')
        //     ->with('success', 'Berita Berhasil Diupdate');
    }

    public function destroy($id_permintaan)
    {
        //fungsi eloquent untuk menghapus data
        Permintaan::where('id', $id_permintaan)->delete();
        return redirect('/pemohon-permintaan')
            ->with('success', 'Berita Berhasil Dihapus');
    }
}
