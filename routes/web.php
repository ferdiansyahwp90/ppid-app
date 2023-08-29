<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\profile\{
    PPIDController,
    SOPController,
    StrukturController,
    TugasController,
    VisiController,
};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Kegiatan\{
    // GaleriController,
    BeritaController
};
use App\Http\Controllers\GaleriController;
// use App\Http\Controllers\Admin\Kegiatan\GaleriController;    
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
//use App\Http\Controllers\Pemohon\PemohonController;
use App\Http\Controllers\Pemohon\{
    PermintaanController,
    PemohonController,
    InformasiController,
    DetailController,
};
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
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role_id == 1) {
            return redirect()->route('dashboard', 'index');
        }

        if ($user->role_id == 2) {
            return redirect('pemohon');
        }
    }
    return view('index');
});
Route::get('/ppid', function () {
    return view('profile.ppid.index');
});
Route::get('/struktur', function () {
    return view('profile.struktur.index');
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authCheck', [LoginController::class, 'authenticate']);

Route::middleware(['preventBackHistory'])->group(function () {
    Auth::routes();
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('dashboard');
    //Profile
    Route::resource('ppid', PPIDController::class);
    Route::resource('sop', SOPController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('tugas', TugasController::class);
    Route::resource('visi', VisiController::class);

    //Layanan
    Route::resource('laporanAkses', LaporanAksesController::class);
    Route::resource('laporanPelayanan', LaporanPelayananController::class);
    Route::resource('mekanisme', MekanismeController::class);
    Route::resource('pengajuanKeberatan', PengajuanKeberatanController::class);
    Route::resource('penyelesaianSengketa', PenyelesaianSengketaController::class);
    Route::resource('permohonanLangsung', PermohonanLangsungController::class);

    //Daftar Informasi
    Route::resource('bekala', BerkalaController::class);
    Route::resource('dikecualikan', DikecualikanController::class);
    Route::resource('sertamerta', SertamertaController::class);
    Route::resource('setiapsaat', SetiapsaatController::class);

    //Kegiatan
    Route::resource('galeri', GaleriController::class);
    Route::resource('berita', BeritaController::class);
    Route::post('/galeri/store', [GaleriController::class, 'store']);
});

Route::middleware(['auth', 'isPemohon'])->group(function () {
    Route::get('/pemohon', [PemohonController::class, 'index']);

    Route::resource('pemohon-permintaan', PermintaanController::class);
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
