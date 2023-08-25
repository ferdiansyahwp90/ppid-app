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
              <h5 class="card-title">Edit Galeri</h5>

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

                <form method="POST" action="/admin-galeri/{{ $galeri->id }}" enctype="multipart/form-data">
                  @method("PUT")  
                  @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="name" name="name" class="form-control @error('nama') is-invalid @enderror" id="name"  value="{{ $galeri->name }}" aria-describedby="name" >
                        @error('nama')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"  value="{{ $galeri->deskripsi }}" aria-describedby="deskripsi" >
                        @error('deskripsi')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control  @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ $galeri->tanggal}}" aria-describedby="tanggal" >
                        @error('tanggal')
                          <div class="invalid-feedback ml-1">Bidang ini wajib diisi</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto</label>
                        @if($galeri->photo)
                          <img src="{{ asset('storage/'.$galeri->photo) }}" alt="" class="w-50">
                        @else
                          <img alt="" class="w-50">
                        @endif
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" value="{{ $galeri->photo }}" aria-describedby="photo" >
                        @error('photo')
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