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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Laporan Akses Informasi Publik</h5>

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

                <form method="POST" action="/admin-laporanAkses/{{ $laporanAkses->id }}" enctype="multipart/form-data" id="myForm">
                  @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"  value="{{ $laporanAkses->nama }}" aria-describedby="nama" >
                        @error('nama')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">File</label>
                            @if($laporanAkses->file)
                            <img src="{{ asset('storage/'.$laporanAkses->file) }}" alt="" class="w-50">
                            @else
                            <img alt="" class="w-50">
                            @endif
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file" value="{{ $laporanAkses->file }}" aria-describedby="file" >
                        @error('file')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

@endsection