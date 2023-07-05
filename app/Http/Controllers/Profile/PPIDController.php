<?php

namespace App\Http\Controllers\profile;

use Illuminate\Http\Request;
use App\Models\Profile\PPID;

class PPIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.ppid.index');
    }

    // public function data()
    // {
    //     $ppid = Ppid::orderBy('id_ppid', 'desc')->get();

    //     return datatables()
    //         ->of($ppid)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($ppid) {
    //             return '
    //             <div class="btn-group">
    //                 <a onclick="editForm(`' . route('ppid.update', $ppid->id_ppid) . '`)" style="background-color: #548CFF" class="float-end btn btn-success text-light">Edit Data</a>
    //                 <a onclick="deleteData(`' . route('ppid.destroy', $ppid->id_ppid) . '`)" style="background-color: #F32424" class="float-end btn btn-success text-light">Delete</a>
    //             </div>
    //             ';
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $ppid = new Ppid();
    //     $ppid->nama_ppid = $request->nama_ppid;
    //     $ppid->save();

    //     return response()->json('Data berhasil disimpan', 200);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $ppid = Ppid::find($id);

    //     return response()->json($ppid);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $ppid = Ppid::find($id);
    //     $ppid->nama_ppid = $request->nama_ppid;
    //     $ppid->update();

    //     return response()->json('Data berhasil disimpan', 200);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $ppid = Ppid::find($id);
    //     $ppid->delete();

    //     return response(null, 204);
    // }
}