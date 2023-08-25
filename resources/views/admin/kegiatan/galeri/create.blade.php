@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main" >
  
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
              <h5 class="card-title">Tambah Galeri</h5>
              <div class="card-body">
                <div class="card-body">
                  <form method="POST" id="logout-form" action="{{route('admin-galeri.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="name" class="form-control rad-6 fs-normal @error('name') is-invalid @enderror" placeholder="name" >
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
                    
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="/admin/galeri">Cancel</a>
                    </div>
                    {{-- {{ Form::close() }} --}}
                  </form>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>
</main>

@endsection