@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Struktur Organisasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Profile</a></li>
          <li class="breadcrumb-item active">Struktur Organisasi</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Struktur Organisasi</h5>

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

                <form method="POST" action="/admin-struktur/{{ $struktur->id }}" enctype="multipart/form-data" >
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="photo">Deskripsi</label>
                        <textarea type="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" id="deskripsi"  aria-describedby="photo" value={!! $struktur->photo !!}></textarea>
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