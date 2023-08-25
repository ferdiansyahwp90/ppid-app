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

  
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div>
              <h5 class="card-title">Tambah Berita</h5>
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

                <form method="POST" action="{{route('admin-berita.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="name" name="name" class="form-control rad-6 fs-normal" placeholder="name" >
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <input type="deskripsi" name="deskripsi" class="form-control rad-6 fs-normal @error('deskripsi') is-invalid @enderror" placeholder="deskripsi">
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input type="datetime-local" name="tanggal" class="form-control rad-6 fs-normal @error('tanggal') is-invalid @enderror" placeholder="tanggal">
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="photo">Foto</label>
                      <input type="file" name="photo" class="form-control rad-6 fs-normal @error('photo') is-invalid @enderror" placeholder="photo" >
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="link">Link</label>
                      <input type="text" name="link" class="form-control" id="link" ariadescribedby="link" >
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