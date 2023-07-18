<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Profile\{
    PPIDController,
    MaklumatController,
    SOPController,
    StrukturController,
    TugasController,
    VisiController,
};
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/ppid', function () {
    return view('profile.ppid.index');
});
Route::get('/tugas&fungsi', function () {
    return view('profile.tugas&fungsi.index');
});
Route::get('/visi&misi', function () {
    return view('profile.visi&misi.index');
});
Route::get('/SOPppid', function () {
    return view('profile.SOPppid.index');
});
Route::get('/SK', function () {
    return view('regulasi.SK.index');
});
Route::get('/informasi', function () {
    return view('daftarinformasi.index');
});
Route::get('/berkala', function () {
    return view('daftarinformasi.berkala.index');
});
Route::get('/sertamerta', function () {
    return view('daftarinformasi.sertamerta.index');
});
Route::get('/setiapsaat', function () {
    return view('daftarinformasi.setiapsaat.index');
});
Route::get('/dikecualikan', function () {
    return view('daftarinformasi.dikecualikan.index');
});
Route::get('/kontak', function () {
    return view('kontak.index');
});
Route::get('/formulir', function () {
    return view('formulir.index');
});
Route::get('/lkjip', function () {
    return view('layanan.lkjip.index');
});
Route::get('/permohonan', function () {
    return view('layanan.permohonan.index');
});
Route::get('/laip', function () {
    return view('layanan.laip.index');
});

Route::get('/login', function () {
    return view('auth.login');
});
Auth::routes();
//admin
Route::get('/user', function () {
    return view('admin.index');
});
Route::get('/pemohon', function () {
    return view('pemohon.index');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Pemohon
Route::get('/profilepemohon', function () {
    return view('pemohon.profile.index');
});
