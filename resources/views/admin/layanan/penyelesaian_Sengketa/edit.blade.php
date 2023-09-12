@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Prosedur Penyelesaian Sengketa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Layanan</a></li>
          <li class="breadcrumb-item active">Prosedur Penyelesaian Sengketa</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Prosedur Penyelesaian Sengketa</h5>

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

                <form method="POST" action="/admin-penyelesaianSengketa/{{ $penyelesaianSengketa->id }}" enctype="multipart/form-data" id="myForm">
                  @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" class="form-control" id="nama" aria-describedby="nama" value={{$penyelesaianSengketa->nama}}></input>
                        <div class="invalid-feedback">
                          Bidang ini Wajib Diisi!.
                        </div>
                      </div>
  
                      <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" accept="video/mp4,video/x-m4v,video/*" name="file" class="form-control" id="file" aria-describedby="file" value={{$penyelesaianSengketa->file}}></input>
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