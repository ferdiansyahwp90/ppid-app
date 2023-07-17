<?php

namespace App\Http\Controllers\profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use App\Models\Profile\PPID;

class VisiController extends Controller
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