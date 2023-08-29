@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Laporan Akses Informasi Publik</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Layanan</a></li>
          <li class="breadcrumb-item active">Laporan Akses Informasi Publik</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

  
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div>
              <h5 class="card-title">Tambah Laporan Akses Informasi Publik</h5>
            </div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{route('admin-laporanAkses.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="nama" name="nama" class="form-control rad-6 fs-normal" placeholder="nama" >
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="file">File</label>
                      <input type="file" name="file" class="form-control rad-6 fs-normal @error('file') is-invalid @enderror" placeholder="file" >
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>

@endsection