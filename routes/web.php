<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\profile\{
    PPIDController,
    SOPController,
    StrukturController,
    TugasController,
    VisiController,
};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Kegiatan\{
    GaleriController,
    BeritaController,
};
use App\Http\Controllers\Admin\Layanan\{
    LaporanAksesController,
    LaporanPelayananController,
    MekanismeController,
    PengajuanKeberatanController,
    PenyelesaianSengketaController,
    PermohonanLangsungController,
};
use App\Http\Controllers\Admin\DaftarInformasi\{
    BerkalaController,
    DikecualikanController,
    SertamertaController,
    SetiapsaatController,
};
use App\Http\Controllers\Pemohon\PemohonController;

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

// Route::get('/', [DashboardController::class, 'index']);

Route::get('/',function () {
   if(Auth::check()){
        $user = Auth::user();
        if ($user->role_id == 1) {
            return redirect()->route('dashboard','index');
        }

        if ($user->role_id == 2) {
            return redirect('pemohon');
        }
   }
   return view('index');
});

Route::get('/profile-ppid', function () {
    return view('profile.ppid.index');
});
Route::get('/profile-struktur', function () {
    return view('profile.struktur.index');
});
Route::get('/profile-tugas&fungsi', function () {
    return view('profile.tugas&fungsi.index');
});
Route::get('/profile-visi&misi', function () {
    return view('profile.visi&misi.index');
});
Route::get('/profile-SOPppid', function () {
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
Route::get('/mekanisme', function () {
    return view('layanan.mekanisme.index');
});
Route::get('/pengajuanKeberatan', function () {
    return view('layanan.pengajuanKeberatan.index');
});
Route::get('/penyelesaianSengketa', function () {
    return view('layanan.penyelesaianSengketa.index');
});
Route::get('/galeri', function () {
    return view('kegiatan.galeri.index');
});
Route::get('/berita', function () {
    return view('kegiatan.berita.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::middleware(['preventBackHistory'])->group(function () {
    Auth::routes();
});


Route::middleware(['auth', 'isAdmin'])->group(function(){
        Route::get('/admin/home', [AdminController::class, 'index'])->name('dashboard');
        
        //Profile
        Route::resource('admin-ppid', PPIDController::class);
        Route::resource('admin-sop', SOPController::class);
        Route::resource('admin-struktur', StrukturController::class);
        Route::resource('admin-tugas', TugasController::class);
        Route::resource('admin-visi', VisiController::class);

        //Layanan
        Route::resource('admin-laporanAkses', LaporanAksesController::class);
        Route::resource('admin-laporanPelayanan', LaporanPelayananController::class);
        Route::resource('admin-mekanisme', MekanismeController::class);
        Route::resource('admin-pengajuanKeberatan', PengajuanKeberatanController::class);
        Route::resource('admin-penyelesaianSengketa', PenyelesaianSengketaController::class);
        Route::resource('admin-permohonanLangsung', PermohonanLangsungController::class);

        //Daftar Informasi
        Route::resource('admin-bekala', BerkalaController::class);
        Route::resource('admin-dikecualikan', DikecualikanController::class);
        Route::resource('admin-sertamerta', SertamertaController::class);
        Route::resource('admin-setiapsaat', SetiapsaatController::class);
 
        //Kegiatan
        Route::resource('admin-galeri', GaleriController::class);
        Route::resource('admin-berita', BeritaController::class);
});

Route::middleware(['auth'])->group(function(){
    Route::middleware(['isPemohon'])->group(function() {
        Route::controller(PemohonController::class)->group(function(){
            Route::get('pemohon', 'index');
            Route::put('update_profile', 'update_profile');
            Route::get('change_password', 'change_password');
            Route::put('update_password', 'update_password');
        });
    });
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/');
});
Route::get('/config', function () {
    Artisan::call(
        'migrate:fresh',
        [
            '--force' => true
        ]
    );
    Artisan::call(
        'db:seed',
        [
            '--force' => true
        ]
    );
});


