<?php

namespace App\Http\Controllers\profile;

use Illuminate\Http\Request;
// use App\Models\Profile\PPID;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
}