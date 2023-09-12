<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\AdminController;
use App\Mail\VerificationEmail;
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
    BeritaController
};
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
    InformasiController,
    KategoriController,
};
//use App\Http\Controllers\Pemohon\PemohonController;
use App\Http\Controllers\Pemohon\{
    PermintaanController,
    DetailInformasi,
    PemohonController,
};
use App\Models\Admin\DaftarInformasi\Kategori;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::controller(DashboardController::class)->group(function() {
    //Profile
    Route::get('profile-ppid', 'profile'); 
    Route::get('profile-struktur', 'struktur'); 
    Route::get('profile-tugas', 'tugas'); 
    Route::get('profile-visi', 'visi'); 
    Route::get('profile-sop', 'sop'); 

    //Layanan
    Route::get('layanan-permohonanLangsung', 'permohonanLangsung');
    Route::get('layanan-mekanisme', 'mekanisme');
    Route::get('layanan-pengajuanKeberatan', 'pengajuanKeberatan');
    Route::get('layanan-penyelesaianSengketa', 'penyelesaianSengketa');
    Route::get('layanan-laporanAkses', 'laporanAkses');
    Route::get('layanan-laporanPelayanan', 'laporanPelayanan');

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

    //Kegiatan
    Route::get('kegiatan-galeri', 'galeri');
    Route::get('kegiatan-berita', 'berita');

    //Formulir
    Route::get('/kontak', function () {
        return view('kontak.index');
    });
    Route::get('/formulir', function () {
        return view('formulir.index');
    });
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authCheck', [LoginController::class, 'authenticate']);

Route::middleware(['preventBackHistory'])->group(function () {
    Auth::routes(['verified']);
});
// Route::get('/verify-email', function (){
//     Mail::to('wardanaputraferdiansyah@gmail.com')
//         ->send(new VerificationEmail());
// });
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/pemohon');
// })->middleware(['auth', 'signed'])->name('verification.verify');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::middleware(['auth', 'isAdmin'])->group(function () {
    
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
    Route::resource('admin-kategori', KategoriController::class);
    Route::resource('admin-informasi', InformasiController::class);

    //Kegiatan
    Route::resource('admin-galeri', GaleriController::class);
    Route::resource('admin-berita', BeritaController::class);
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
