<?php

namespace App\Http\Controllers\Admin\DaftarInformasi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Setiapsaat;

class SetiapsaatController extends Controller
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