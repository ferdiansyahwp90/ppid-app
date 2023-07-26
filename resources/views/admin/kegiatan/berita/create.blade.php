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
              <h5 class="card-title">Tambah Berita</h5>

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

                <form method="post" action="/admin/berita" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"  aria-describedby="nama" >
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi"  aria-describedby="deskripsi" >
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal" >
                    </div>

                    <div class="form-group">
                        <label for="File">Foto</label>
                        <input type="file" name="photo" class="form-control" id="photo" ariadescribedby="photo" >
                    </div>

                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" id="link" ariadescribedby="link" >
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