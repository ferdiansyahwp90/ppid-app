@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Tugas dan Fungsi PPID</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Profile</a></li>
          <li class="breadcrumb-item active">Tugas dan Fungsi PPID</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Tugas dan Fungsi PPID</h5>

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

                <form method="post" action="{{route('admin-tugas.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" aria-describedby="deskripsi" cols="30" rows="10"></textarea>
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