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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\Kegiatan\{
    GaleriController,
    BeritaController
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
use App\Models\Admin\DaftarInformasi\Dikecualikan;
use App\Models\Admin\DaftarInformasi\Sertamerta;
use App\Models\Admin\DaftarInformasi\Setiapsaat;

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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['preventBackHistory'])->group(function () {
    Auth::routes();
});

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::prefix('admin')->group(function(){
        // Route::controller(AdminController::class)->group(function(){
        //     Route::get('home', 'index');
        // });
        Route::get('/home', [AdminController::class, 'index'])->name('home');

        //Profile

        Route::controller(PPIDController::class)->group(function () {
            Route::get('/ppid','index');
            Route::get('/ppid/create','create')->name('create');
            Route::post('/ppid/store','store')->name('store');
            Route::post('/ppid','index')->name('index');
            Route::get('/ppid/{id_ppid}/edit','edit');
            Route::put('/ppid/{id_ppid}','update');
            Route::delete('/ppid/{id_ppid}','destroy');
        });
        
        Route::controller(SOPController::class)->group(function () {
            Route::get('/sop','index');
            Route::get('/sop/create','create');
            Route::post('/sop/store','store');
            Route::get('/sop/{id_sop}/edit','edit');
            Route::put('/sop/{id_sop}','update');
            Route::delete('/sop/{id_sop}','destroy');
        });

        Route::controller(StrukturController::class)->group(function () {
            Route::get('/struktur','index');
            Route::get('/struktur/create','create');
            Route::post('/struktur/store','store');
            Route::get('/struktur/{id_struktur}/edit','edit');
            Route::put('/struktur/{id_struktur}','update');
            Route::delete('/struktur/{id_struktur}','destroy');
        });

        Route::controller(TugasController::class)->group(function () {
            Route::get('/tugas', 'index');
            Route::get('/tugas/create', 'create');
            Route::post('/tugas/store', 'store');
            Route::get('/tugas/{id_tugas}/edit', 'edit');
            Route::put('/tugas/{id_tugas}', 'update');
            Route::delete('/tugas/{id_tugas}', 'destroy');
        });

        Route::controller(VisiController::class)->group(function () {
            Route::get('/visi', 'index');
            Route::get('/visi/create', 'create');
            Route::post('/visi/store', 'store');
            Route::get('/visi/{id_visi}/edit', 'edit');
            Route::put('/visi/{id_visi}', 'update');
            Route::delete('/visi/{id_visi}', 'destroy');
        });

        //Layanan
        Route::controller(LaporanAksesController::class)->group(function () {
            Route::get('/laporanAkses', 'index');
            Route::get('/laporanAkses/create', 'create');
            Route::post('/laporanAkses/store', 'store');
            Route::get('/laporanAkses/{id_laporanAkses}/edit', 'edit');
            Route::put('/laporanAkses/{id_laporanAkses}', 'update');
            Route::delete('/laporanAkses/{id_laporanAkses}', 'destroy');
        });

        Route::controller(LaporanPelayananController::class)->group(function () {
            Route::get('/laporanPelayanan', 'index');
            Route::get('/laporanPelayanan/create', 'create');
            Route::post('/laporanPelayanan/store', 'store');
            Route::get('/laporanPelayanan/{id_laporanPelayanan}/edit', 'edit');
            Route::put('/laporanPelayanan/{id_laporanPelayanan}', 'update');
            Route::delete('/laporanPelayanan/{id_laporanPelayanan}', 'destroy');
        });

        Route::controller(MekanismeController::class)->group(function () {
            Route::get('/mekanisme', 'index');
            Route::get('/mekanisme/create', 'create');
            Route::post('/mekanisme/store', 'store');
            Route::get('/mekanisme/{id_mekanisme}/edit', 'edit');
            Route::put('/mekanisme/{id_mekanisme}', 'update');
            Route::delete('/mekanisme/{id_mekanisme}', 'destroy');
        });

        Route::controller(PengajuanKeberatanController::class)->group(function () {
            Route::get('/pengajuanKeberatan', 'index');
            Route::get('/pengajuanKeberatan/create', 'create');
            Route::post('/pengajuanKeberatan/store', 'store');
            Route::get('/pengajuanKeberatan/{id_pengajuanKeberatan}/edit', 'edit');
            Route::put('/pengajuanKeberatan/{id_pengajuanKeberatan}', 'update');
            Route::delete('/pengajuanKeberatan/{id_pengajuanKeberatan}', 'destroy');
        });

        Route::controller(PenyelesaianSengketaController::class)->group(function () {
            Route::get('/penyelesaianSengketa', 'index');
            Route::get('/penyelesaianSengketa/create', 'create');
            Route::post('/penyelesaianSengketa/store', 'store');
            Route::get('/penyelesaianSengketa/{id_penyelesaianSengketa}/edit', 'edit');
            Route::put('/penyelesaianSengketa/{id_penyelesaianSengketa}', 'update');
            Route::delete('/penyelesaianSengketa/{id_penyelesaianSengketa}', 'destroy');
        });

        Route::controller(PermohonanLangsungController::class)->group(function () {
            Route::get('/permohonanLangsung', 'index');
            Route::get('/permohonanLangsung/create', 'create');
            Route::post('/permohonanLangsung/store', 'store');
            Route::get('/permohonanLangsung/{id_permohonanLangsung}/edit', 'edit');
            Route::put('/permohonanLangsung/{id_permohonanLangsung}', 'update');
            Route::delete('/permohonanLangsung/{id_permohonanLangsung}', 'destroy');
        });

        //Daftar Informasi
        Route::controller(BerkalaController::class)->group(function () {
            Route::get('/berkala', 'index');
            Route::get('/berkala/create', 'create');
            Route::post('/berkala/store', 'store');
            Route::get('/berkala/{id_berkala}/edit', 'edit');
            Route::put('/berkala/{id_berkala}', 'update');
            Route::delete('/berkala/{id_berkala}', 'destroy');
        });

        Route::controller(DikecualikanController::class)->group(function () {
            Route::get('/dikecualikan', 'index');
            Route::get('/dikecualikan/create', 'create');
            Route::post('/dikecualikan/store', 'store');
            Route::get('/dikecualikan/{id_dikecualikan}/edit', 'edit');
            Route::put('/dikecualikan/{id_dikecualikan}', 'update');
            Route::delete('/dikecualikan/{id_dikecualikan}', 'destroy');
        });

        Route::controller(SertamertaController::class)->group(function () {
            Route::get('/sertamerta', 'index');
            Route::get('/sertamerta/create', 'create');
            Route::post('/sertamerta/store', 'store');
            Route::get('/sertamerta/{id_sertamerta}/edit', 'edit');
            Route::put('/sertamerta/{id_sertamerta}', 'update');
            Route::delete('/sertamerta/{id_sertamerta}', 'destroy');
        });

        Route::controller(SetiapsaatController::class)->group(function () {
            Route::get('/setiapsaat', 'index');
            Route::get('/setiapsaat/create', 'create');
            Route::post('/setiapsaat/store', 'store');
            Route::get('/setiapsaat/{id_setiapsaat}/edit', 'edit');
            Route::put('/setiapsaat/{id_setiapsaat}', 'update');
            Route::delete('/setiapsaat/{id_setiapsaat}', 'destroy');
        });

        //Kegiatan
        Route::controller(GaleriController::class)->group(function () {
            Route::get('/galeri', 'index');
            Route::get('/galeri/create', 'create');
            Route::post('/galeri/store', 'store');
            Route::get('/galeri/{id_galeri}/edit', 'edit');
            Route::put('/galeri/{id_galeri}', 'update');
            Route::delete('/galeri/{id_galeri}', 'destroy');
        });

        Route::controller(BeritaController::class)->group(function () {
            Route::get('/berita', 'index');
            Route::get('/berita/create', 'create');
            Route::post('/berita/store', 'store');
            Route::get('/berita/{id_berita}/edit', 'edit');
            Route::put('/berita/{id_berita}', 'update');
            Route::delete('/berita/{id_berita}', 'destroy');
        });

    });
});

Route::middleware(['auth'])->group(function(){
    Route::controller(PemohonController::class)->group(function(){
        Route::get('home', 'index');
        Route::put('update_profile', 'update_profile');
        Route::get('change_password', 'change_password');
        Route::put('update_password', 'update_password');
    });
});

Route::get('/pemohon', function () {
    return view('pemohon.home.index');
});
Route::get('/home', function () {
    return view('home');
});

// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
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


