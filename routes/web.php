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
use App\Models\Admin\DaftarInformasi\Berkala;
use App\Models\Admin\DaftarInformasi\Dikecualikan;
use App\Models\Admin\DaftarInformasi\Sertamerta;
use App\Models\Admin\DaftarInformasi\Setiapsaat;
use App\Models\Admin\Kegiatan\Galeri;
use App\Models\Admin\Layanan\LaporanAkses;
use App\Models\Admin\Layanan\PengajuanKeberatan;
use App\Models\Admin\Layanan\PenyelesaianSengketa;
use App\Models\Admin\Layanan\PermohonanLangsung;

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
    Route::get('/admin/home', [AdminController::class, 'index'])->name('dashboard');

        //Profile
        Route::controller(PPIDController::class)->group(function () {
            Route::prefix('ppid')->group(function () {
                Route::get('','index');
                Route::get('/create','create')->name('create');
                Route::post('/store','store')->name('store');
                Route::get('/{id_ppid}/edit','edit');
                Route::put('/{id_ppid}','update');
                Route::delete('/{id_ppid}','destroy');
            });
        });
        
        Route::controller(SOPController::class)->group(function () {
            Route::prefix('sop')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_sop}/edit','edit');
                Route::put('/{id_sop}','update');
                Route::delete('/{id_sop}','destroy');
            });
        });

        Route::controller(StrukturController::class)->group(function () {
            Route::prefix('struktur')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_struktur}/edit','edit');
                Route::put('/{id_struktur}','update');
                Route::delete('/{id_struktur}','destroy');
            });
        });

        Route::controller(TugasController::class)->group(function () {
            Route::prefix('tugas')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_tugas}/edit','edit');
                Route::put('/{id_tugas}','update');
                Route::delete('/{id_tugas}','destroy');
            });
        });

        Route::controller(VisiController::class)->group(function () {
            Route::prefix('visi')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_visi}/edit','edit');
                Route::put('/{id_visi}','update');
                Route::delete('/{id_visi}','destroy');
            });
        });

        //Layanan
        Route::controller(LaporanAksesController::class)->group(function () {
            Route::prefix('laporanAkses')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_laporanAkses}/edit','edit');
                Route::put('/{id_laporanAkses}','update');
                Route::delete('/{id_laporanAkses}','destroy');
            });
        });

        Route::controller(LaporanPelayananController::class)->group(function () {
            Route::prefix('laporanPelayanan')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_laporanPelayanan}/edit','edit');
                Route::put('/{id_laporanPelayanan}','update');
                Route::delete('/{id_laporanPelayanan}','destroy');
            });
        });

        Route::controller(MekanismeController::class)->group(function () {
            Route::prefix('mekanisme')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_mekanisme}/edit','edit');
                Route::put('/{id_mekanisme}','update');
                Route::delete('/{id_mekanisme}','destroy');
            });
        });

        Route::controller(PengajuanKeberatanController::class)->group(function () {
            Route::prefix('pengajuanKeberatan')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_pengajuanKeberatan}/edit','edit');
                Route::put('/{id_pengajuanKeberatan}','update');
                Route::delete('/{id_pengajuanKeberatan}','destroy');
            });
        });

        Route::controller(PenyelesaianSengketaController::class)->group(function () {
            Route::prefix('penyelesaianSengketa')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_penyelesaianSengketa}/edit','edit');
                Route::put('/{id_penyelesaianSengketa}','update');
                Route::delete('/{id_penyelesaianSengketa}','destroy');
            });
        });

        Route::controller(PermohonanLangsungController::class)->group(function () {
            Route::prefix('permohonanLangsung')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_permohonanLangsung}/edit','edit');
                Route::put('/{id_permohonanLangsung}','update');
                Route::delete('/{id_permohonanLangsung}','destroy');
            });
        });

        //Daftar Informasi
        Route::controller(BerkalaController::class)->group(function () {
            Route::prefix('berkala')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_berkala}/edit','edit');
                Route::put('/{id_berkala}','update');
                Route::delete('/{id_berkala}','destroy');
            });
        });

        Route::controller(DikecualikanController::class)->group(function () {
            Route::prefix('dikecualikan')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_dikecualikan}/edit','edit');
                Route::put('/{id_dikecualikan}','update');
                Route::delete('/{id_dikecualikan}','destroy');
            });
        });

        Route::controller(SertamertaController::class)->group(function () {
            Route::prefix('sertamerta')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_sertamerta}/edit','edit');
                Route::put('/{id_sertamerta}','update');
                Route::delete('/{id_sertamerta}','destroy');
            });
        });

        Route::controller(SetiapsaatController::class)->group(function () {
            Route::prefix('setiapsaat')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_setiapsaat}/edit','edit');
                Route::put('/{id_setiapsaat}','update');
                Route::delete('/{id_setiapsaat}','destroy');
            });
        });

        //Kegiatan
        Route::controller(GaleriController::class)->group(function () {
            Route::prefix('galeri')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_galeri}/edit','edit');
                Route::put('/{id_galeri}','update');
                Route::delete('/{id_galeri}','destroy');
            });
        });

        Route::controller(BeritaController::class)->group(function () {
            Route::prefix('berita')->group(function () {
                Route::get('','index');
                Route::get('/create','create');
                Route::post('/store','store');
                Route::get('/{id_berita}/edit','edit');
                Route::put('/{id_berita}','update');
                Route::delete('/{id_berita}','destroy');
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

// Route::get('/pemohon', function () {
//     return view('pemohon.home.index');
// });
// Route::get('/home', function () {
//     return view('home');
// });

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


