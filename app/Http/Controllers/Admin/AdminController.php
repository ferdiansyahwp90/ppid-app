<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Pemohon\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::all(); // Mengambil semua isi tabel
        $paginate = User::orderBy('id', 'asc')->paginate(3);
        $permintaan = Permintaan::query(); // Mengambil semua isi tabel
        if(auth()->user()->role_id != 1){
            $permintaan->where('created_by', auth()->user()->id);
        }
        $permintaan = $permintaan->get();
        return view('admin.home.index', ['admin' => $admin, 'paginate' => $paginate, 'permintaan' => $permintaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        User::create($request->all()); //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.home.index')
            ->with('success', 'Admin Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::where('id', $id)->first();
        // return view('admin.home.detail', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = DB::table('users')->where('id', $id)->first();
        return view('admin.home.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('admin.home.index')
            ->with('success', 'Admin Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::where('id', $id)->delete();
        return redirect()->route('admin.index')
            ->with('success', 'Admin Berhasil Dihapus');
    }
}