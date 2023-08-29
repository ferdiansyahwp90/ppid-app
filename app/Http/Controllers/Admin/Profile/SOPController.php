<?php

namespace App\Http\Controllers\Admin\profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Profile\SOP;
use Illuminate\Support\Facades\DB;

class SOPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sop = SOP::all(); // Mengambil semua isi tabel
        $paginate = SOP::orderBy('id', 'asc')->paginate(5);
        return view('admin.profile.sop.index', ['sop' => $sop,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.sop.create');
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
        SOP::create([
            'deskripsi' => $request-> deskripsi,
        ]);
        return redirect('/admin-sop')
            ->with('success', 'Standart Operasional Prosedur Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_sop)
    {
        $sop = SOP::where('id', $id_sop)->first();
        return view('admin.profile.sop.detail', compact('sop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sop)
    {
        $sop = DB::table('sop')->where('id', $id_sop)->first();
        return view('admin.profile.sop.edit', compact('sop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sop)
    {
        //melakukan validasi data
        $request->validate([
            'deskripsi' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           SOP::where('id', $id_sop)
                ->update([
                    'deskripsi' => $request-> deskripsi,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('/admin-sop')
                ->with('success', 'Standart Operasional Prosedur Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sop)
    {
        //fungsi eloquent untuk menghapus data
        SOP::where('id', $id_sop)->delete();
        return redirect('/admin-sop')  
            -> with('success', 'Standart Operasional Prosedur Berhasil Dihapus');       
    }
}