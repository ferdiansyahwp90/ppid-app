@extends('pemohon.home.index')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Permintaan Informasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Permintaan Informasi</a></li>
          <li class="breadcrumb-item active">Detail Informasi</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Permintaan</h5>

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
                
                <form method="POST" action="/pemohon-permintaan/{{ $permintaan->id }}" enctype="multipart/form-data" id="myForm">
                  @method("PUT")
                  @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"  value="{{ $permintaan->nama }}" aria-describedby="nama" >
                    </div>
                    <div>
                    <label for="noidentitas">NO. KTP</label>
                      <input type="text" name="noidentitas" class="form-control rad-6 fs-normal @error('noidentitas') is-invalid @enderror" placeholder="noidentitas">
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="{{ $permintaan->pekerjaan }}" aria-describedby="pekerjaan" >
                    </div>

                    <div class="form-group">
                        <label for="notelp">notelp</label>
                        <input type="notelp" name="notelp" class="form-control" id="notelp" value="{{ $permintaan->notelp }}" aria-describedby="notelp" >
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $permintaan->email }}" aria-describedby="email" >
                    </div>

                    <div class="form-group">
                        <label for="detailinfo">Detail Informasi</label>
                        <input type="detailinfo" name="detailinfo" class="form-control" id="detailinfo" value="{{ $permintaan->detailinfo }}" aria-describedby="detailinfo" >
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