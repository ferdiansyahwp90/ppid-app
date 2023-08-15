<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\DaftarInformasi\Berkala;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home.index', compact([
            'data'
        ]));
    }
}