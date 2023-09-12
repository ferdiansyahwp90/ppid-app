@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Permohonan Langsung</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Layanan</a></li>
          <li class="breadcrumb-item active">Permohonan Langsung</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Permohonan Langsung</h5>

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

                <form method="POST" action="/admin-permohonanLangsung/{{ $permohonanLangsung->id }}" enctype="multipart/form-data" id="myForm">
                  @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="deskripsi" >Deskripsi</label>
                        <textarea name="deskripsi" type="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" aria-describedby="deskripsi" value={!! $permohonanLangsung->deskripsi !!}></textarea>
                        @error('deskripsi')
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