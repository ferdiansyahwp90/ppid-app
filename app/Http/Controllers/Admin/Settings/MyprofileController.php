<?php

namespace App\Http\Controllers\Admin\Settings;
 
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\DB;

class MyprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myprofile = UserAdmin::all(); // Mengambil semua isi tabel
        $paginate = UserAdmin::orderBy('id', 'asc')->paginate(5);
        return view('admin.settings.myprofile', ['myprofile' => $myprofile,'paginate'=>$paginate]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.settings.myprofile.create');
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
            'gender' => 'required',
        ]);
        
        //fungsi eloquent untuk menambah data
        UserAdmin::create([
            'nama' => $request-> nama,
            'gender' => $request-> gender,
        ]);
        return redirect('/admin-myprofile')->with('status', "Data '" . $request->nama . "' berhasil ditambahkan");//jika data berhasil ditambahkan, akan kembali ke halaman utama
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($myprofile)
    {
        $myprofile = UserAdmin::where('id', $myprofile)->first();
        return view('admin.settings.myprofile', compact('myprofile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($myprofile)
    {
        $myprofile = DB::table('myprofile')->where('id', $myprofile)->first();
        return view('admin.settings.myprofile', compact('myprofile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $myprofile)
    {
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'gender' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           UserAdmin::where('id', $myprofile)
                ->update([
                    'nama' => $request-> nama,
                    'gender' => $request-> gender,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect('/admin-myprofile')
                ->with('success', 'myprofile Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($myprofile)
    {
        //fungsi eloquent untuk menghapus data
        // UserAdmin::where('id', $myprofile)->delete();
        // return redirect('/admin-myprofile')
        //     -> with('success', 'myprofile Berhasil Dihapus');       
    }

}