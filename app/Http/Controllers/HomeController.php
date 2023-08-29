<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAdmin;
use App\Models\UserPemohon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' , 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function add()
    {
        $role = Auth::user()->role_id;
        $data = [
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->email,
            'phone' => null
        ];
        switch($role){
            case 1:
                UserAdmin::create($data);
                break;
            case 2:
                UserPemohon::create($data);
                break;
        }
        
        return redirect()->to('/pemohon');
    }
}
