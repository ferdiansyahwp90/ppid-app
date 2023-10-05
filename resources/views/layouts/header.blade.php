            {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <h1>Maintenance Website..</h1>
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
            </div> --}}
    
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                {{-- <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <a style="color:white;" href="https://wa.me/+6281334302285">+6281334302285</a>
                </div> --}}
                <div class="h-100 d-inline-flex align-items-center">
                    <span class="fa fa-envelope me-2"></span>
                    <a style="color:white;" href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=diskominfo@problinggokab.co.id" >ppid@probolinggokab.co.id</a>
                </div>
            </div>                       
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
                           
            {{-- <img src="assets/img/logo.png" alt="Portal Kabupaten Probolinggo" decoding="async" width="262" height="70 "> --}}
            {{-- <h1 class="m-0">PPID</h1> --}}
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="{{ url('profile-ppid') }}" class="dropdown-item" id="ppid">Seputar PPID</a>
                        <a href="{{ url('profile-struktur')}}" class="dropdown-item" >Struktur Organisasi</a>
                        <a href="{{ url('profile-tugas')}}" class="dropdown-item">Tugas dan Fungsi PPID</a>
                        <a href="/storage/Maklumat/Maklumat_Pelayanan_PPID_KabProbolinggo.pdf" class="dropdown-item" target="_blank">Maklumat Pelayanan Informasi Publik</a>
                        <a href="{{ url('profile-visi')}}" class="dropdown-item">Visi dan Misi PPID</a>
                        <a href="{{ url('profile-sop')}}" class="dropdown-item">SOP PPID</a>
                        <a href="/storage/SK/PERBUP_PENUNJUKAN PEJABAT PENGELOLA LAYANAN INFORMASI.pdf" class="dropdown-item" target="_blank">SK PPID</a></li>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Regulasi</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="/storage/regulasi/UU No. 14 Thn 2008.pdf" class="dropdown-item" target="_blank">UNDANG-UNDANG 14 TAHUN 2008</a>
                        <a href="/storage/regulasi/UU No. 43 Tahun 2009.pdf" class="dropdown-item" target="_blank">UNDANG-UNDANG 43 TAHUN 2009</a>
                        <a href="/storage/regulasi/PP No. 61 tahun 2010.pdf" class="dropdown-item" target="_blank">PERATURAN PEMERINTAH NO 61 TAHUN 2010</a>
                        <a href="/storage/regulasi/Perki No. 1 tahun 2013.pdf" class="dropdown-item" target="_blank">PERKI NO 1 TAHUN 2013</a>
                        <a href="/storage/regulasi/Perki No. 1 tahun 2021.pdf" class="dropdown-item" target="_blank">PERKI NO 1 TAHUN 2021</a>
                        <a href="/storage/regulasi/Permendagri No. 3 tahun 2017.pdf" class="dropdown-item" target="_blank">PERMENDAGRI NO 3 TAHUN 2017</a>
                        <a href="/storage/regulasi/PERBUP-NO-85-thn-2017-tentang-PEDOMAN-PENGELOLAAN-PELAYANAN-INF.pdf" class="dropdown-item" target="_blank">PERBUP JATIM NO 8 TAHUN 2017</a>
                        <a href="/storage/regulasi/SK_PENUNJUKAN PEJABAT PLID.pdf" class="dropdown-item" target="_blank">SK PPID</a></li>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="/layanan-permohonanLangsung" class="dropdown-item">Permohonan Informasi Datang Langsung</a>
                        <a href="/layanan-mekanisme" class="dropdown-item">Mekanisme/Proses</a>
                        <a href="/layanan-pengajuanKeberatan" class="dropdown-item">Pengajuan Keberatan</a>
                        <a href="/layanan-penyelesaianSengketa" class="dropdown-item">Prosedur Penyelesaian Sengketa</a>
                        <a href="/layanan-laporanAkses" class="dropdown-item">Laporan Akses Informasi Publik</a>
                        <a href="/layanan-laporanPelayanan" class="dropdown-item">Laporan Pelayanan Informasi Publik</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="/informasi" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Daftar Informasi</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="/daftarinformasi-berkala" class="dropdown-item">Informasi Berkala</a>
                        <a href="/daftarinformasi-sertamerta" class="dropdown-item">Informasi Serta Merta</a>
                        <a href="/daftarinformasi-setiapsaat" class="dropdown-item">Informasi Setiap Saat</a>
                        <a href="/daftarinformasi-dikecualikan" class="dropdown-item">Informasi Yang Dikecualikan</a>
                    </div>
                </div>

                {{-- <a class="nav-link scrollto"  href="https://katalog.satudata.go.id/dataset/?res_format=WMS&organization=pemerintah-kabupaten-probolinggo" class="nav-item nav-link">Data</a> --}}
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kegiatan</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="/kegiatan-galeri" class="dropdown-item">Galeri</a>
                        <a href="/kegiatan-berita" class="dropdown-item">Berita</a>
                    </div>
                </div>
                <li>
                    <a href="/kontak" class="nav-item nav-link">Kontak</a>
                </li>
                <li>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Permohonan Informasi </a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="/login" class="dropdown-item">Online</a>
                            <a href="/storage/formulir/Form Permohonan Informasi_PPID KAB PROB.pdf" class="dropdown-item">Offline</a>
                        </div>
                    </div>
                </li>
                {{-- <li>
                    <a href="/login" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Masuk <i class="fa fa-arrow-right ms-3"></i></a>
                </li> --}}
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
