<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Admin\Profile\PPID;
use App\Models\Admin\Profile\SOP;
use App\Models\Admin\Profile\Struktur;
use App\Models\Admin\Profile\Tugas;
use App\Models\Admin\Profile\Visi;
use App\Models\Admin\Layanan\LaporanAkses;
use App\Models\Admin\Layanan\LaporanPelayanan;
use App\Models\Admin\Layanan\Mekanisme;
use App\Models\Admin\Layanan\PengajuanKeberatan;
use App\Models\Admin\Layanan\PenyelesaianSengketa;
use App\Models\Admin\Layanan\PermohonanLangsung;
use App\Models\Admin\Kegiatan\Galeri;
use App\Models\Admin\Kegiatan\Berita;

class DashboardController extends Controller
{
    //Profile
    public function profile()
    {
        $ppid = PPID::all(); // Mengambil semua isi tabel
        $paginate = PPID::orderBy('id', 'asc')->paginate(5);
        return view('profile.ppid.index', ['ppid' => $ppid,'paginate'=>$paginate]);
    }

    public function sop()
    {
        $sop = SOP::all(); // Mengambil semua isi tabel
        $paginate = SOP::orderBy('id', 'asc')->paginate(5);
        return view('profile.sop.index', ['sop' => $sop,'paginate'=>$paginate]);
    }

    public function struktur()
    {
        $struktur = Struktur::all(); // Mengambil semua isi tabel
        $paginate = Struktur::orderBy('id', 'asc')->paginate(5);
        return view('profile.struktur.index', ['struktur' => $struktur,'paginate'=>$paginate]);
    }

    public function tugas()
    {
        $tugas = Tugas::all(); // Mengambil semua isi tabel
        $paginate = Tugas::orderBy('id', 'asc')->paginate(5);
        return view('profile.tugas&fungsi.index', ['tugas' => $tugas,'paginate'=>$paginate]);
    }

    public function visi()
    {
        $visi = Visi::all(); // Mengambil semua isi tabel
        $paginate = Visi::orderBy('id', 'asc')->paginate(5);
        return view('profile.visi&misi.index', ['visi' => $visi,'paginate'=>$paginate]);
    }

    //Layanan
    public function laporanAkses()
    {
        $laporanAkses = LaporanAkses::all(); // Mengambil semua isi tabel
        $paginate = LaporanAkses::orderBy('id', 'asc')->paginate(5);
        return view('layanan.laporanAkses.index', ['laporanAkses' => $laporanAkses,'paginate'=>$paginate]);
    }

    public function laporanPelayanan()
    {
        $laporanPelayanan = LaporanPelayanan::all(); // Mengambil semua isi tabel
        $paginate = LaporanPelayanan::orderBy('id', 'asc')->paginate(5);
        return view('layanan.laporanPelayanan.index', ['laporanPelayanan' => $laporanPelayanan,'paginate'=>$paginate]);
    }

    public function mekanisme()
    {
        $mekanisme = Mekanisme::all(); // Mengambil semua isi tabel
        $paginate = Mekanisme::orderBy('id', 'asc')->paginate(5);
        return view('layanan.mekanisme.index', ['mekanisme' => $mekanisme,'paginate'=>$paginate]);
    }

    public function pengajuanKeberatan()
    {
        $pengajuanKeberatan = PengajuanKeberatan::all(); // Mengambil semua isi tabel
        $paginate = PengajuanKeberatan::orderBy('id', 'asc')->paginate(5);
        return view('layanan.pengajuanKeberatan.index', ['pengajuanKeberatan' => $pengajuanKeberatan,'paginate'=>$paginate]);
    }

    public function penyelesaianSengketa()
    {
        $penyelesaianSengketa = PenyelesaianSengketa::all(); // Mengambil semua isi tabel
        $paginate = PenyelesaianSengketa::orderBy('id', 'asc')->paginate(5);
        return view('layanan.penyelesaianSengketa.index', ['penyelesaianSengketa' => $penyelesaianSengketa,'paginate'=>$paginate]);
    }

    public function permohonanLangsung()
    {
        $permohonanLangsung = PermohonanLangsung::all(); // Mengambil semua isi tabel
        $paginate = PermohonanLangsung::orderBy('id', 'asc')->paginate(5);
        return view('layanan.permohonanLangsung.index', ['permohonanLangsung' => $permohonanLangsung,'paginate'=>$paginate]);
    }

    //Kegiatan
    public function galeri()
    {
        $galeri = Galeri::all(); // Mengambil semua isi tabel
        $paginate = Galeri::orderBy('id', 'asc')->paginate(5);

        // dd($galeri->toArray());
        return view('kegiatan.galeri.index', ['galeri' => $galeri,'paginate'=>$paginate]);
    }

    public function berita(){
        $berita = Berita::all(); // Mengambil semua isi tabel
        $paginate = Berita::orderBy('id', 'asc')->paginate(5);
        return view('kegiatan.berita.index', ['berita' => $berita,'paginate'=>$paginate]);
    }

}
