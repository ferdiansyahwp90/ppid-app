@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Berita</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Kegiatan</a></li>
          <li class="breadcrumb-item active">berita</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Berita</h5>

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

                <form method="POST" action="/admin-berita/{{ $berita->id }}" enctype="multipart/form-data" id="myForm">
                  @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name"  value="{{ $berita->name }}" aria-describedby="name" >
                        @error('name')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"  value="{{ $berita->deskripsi }}" aria-describedby="deskripsi" >
                        @error('deskripsi')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $berita->tanggal }}" aria-describedby="tanggal" >
                        @error('tanggal')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto</label>
                        @if($berita->photo)
                          <img src="{{ asset('storage/'.$berita->photo) }}" alt="" class="w-50">
                        @else
                          <img alt="" class="w-50">
                        @endif
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" value="{{ $berita->photo }}" aria-describedby="photo" >
                        @error('photo')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="link" name="link" class="form-control @error('link') is-invalid @enderror" id="link" value="{{ $berita->link }}" aria-describedby="link" >
                        @error('link')
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