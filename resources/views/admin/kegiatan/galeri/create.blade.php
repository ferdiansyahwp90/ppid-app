@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Galeri</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Kegiatan</a></li>
          <li class="breadcrumb-item active">galeri</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Galeri</h5>
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
                <div class="card-body">
                  <form method="POST" action="{{route('galeri.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Masukkan nama foto" value="{{ old('nama') }}">
                                @error('nama')<div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>@enderror
                      </div>

                      <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                name="deskripsi" placeholder="Masukkan deskripsi foto" value="{{ old('deskripsi') }}">
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                      </div>

                      <div class="form-group">
                          <label for="tanggal">Tanggal</label>
                          <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" placeholder="Masukkan tanggal foto" value="{{ old('tanggal') }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                      </div>

                      <div class="form-group">
                          <label for="File">Foto</label>
                          <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                                name="photo" placeholder="Masukkan photo foto" value="{{ old('photo') }}">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                      <div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a class="btn btn-secondary" href="/admin/galeri">Cancel</a>
                      </div>
                  </form>
                </div>
            </div>

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>

@endsection