@extends('pemohon.home.index')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Permintaan Informasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">PERMINTAAN INFORMASI</a></li>
          <li class="breadcrumb-item active">PERMINTAAN INFORMASI PEMOHON</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

  
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
              <h5 class="card-title">Tambah Permintaan Informasi</h5>
              <div class="card-body">
                <div class="card-body">
                  <form method="POST"  action="{{route('pemohon-permintaan.store')}}" enctype="multipart/form-data">
                     @csrf
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" class="form-control rad-6 fs-normal" placeholder="nama" >
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="noidentitas">NO. KTP</label>
                      <input type="text" name="noidentitas" class="form-control rad-6 fs-normal @error('noidentitas') is-invalid @enderror" placeholder="noidentitas">
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="pekerjaan">pekerjaan</label>
                      <input type="text" name="pekerjaan" class="form-control rad-6 fs-normal @error('pekerjaan') is-invalid @enderror" placeholder="pekerjaan">
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="notelp">notelp</label>
                      <input type="text" name="notelp" class="form-control rad-6 fs-normal @error('notelp') is-invalid @enderror" placeholder="notelp" >
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="email">email</label>
                      <input type="email" name="email" class="form-control" id="email" ariadescribedby="email" >
                      <div class="invalid-feedback">
                        Bidang ini Wajib Diisi!.
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="detailinfo">Detail Informasi</label>
                    <input type="text" name="detailinfo" class="form-control" id="detailinfo" ariadescribedby="detailinfo" >
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
    </section>
</main>

@endsection