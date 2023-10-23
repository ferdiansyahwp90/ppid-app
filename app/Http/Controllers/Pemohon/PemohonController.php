<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\User;
use App\Models\Pemohon\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acc = Permintaan::where('status', 'Sudah')->where('created_by', auth()->user()->id)->get();
        $revoke = Permintaan::where('status', 'Belum')->where('created_by', auth()->user()->id)->get();
        return view('pemohon.home.dashboard', ['acc' => $acc, 'revoke' => $revoke]);
    }

    public function profile()
    {
        $title = 'Profile';
        return view('pemohon.profile.index', ['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemohon.create');
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
        return redirect()->route('pemohon.home.index')
            ->with('success', 'pemohon Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemohon = User::where('id', $id)->first();
        // return view('pemohon.home.detail', compact('pemohon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemohon = DB::table('users')->where('id', $id)->first();
        return view('pemohon.home.edit', compact('pemohon'));
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
        return redirect()->route('pemohon.home.index')
            ->with('success', 'pemohon Berhasil Diupdate');
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
        return redirect()->route('pemohon.index')
            ->with('success', 'pemohon Berhasil Dihapus');
    }
}