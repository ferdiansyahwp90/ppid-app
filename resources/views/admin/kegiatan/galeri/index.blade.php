@extends('admin.elements.firstpage')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Galeri</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Kegiatan</a></li>
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
              <h5 class="card-title">Data galeri</h5>
              <a href="{{ url('admin-galeri/create') }}" class="btn btn-primary py-2 px-3 fs-normal float-right mb-3 shadow-sm">Tambah Data</a>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($galeri as $item)    
                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->photo}}</td> 
                            {{-- <td> 
                                <div style="max-height: 350px; overflow:hidden">
                                  <img src="{{ asset('storage/'.$item->photo) }}" alt="" class="w-50">
                                </div>
                            </td> --}}
                            <td>
                              <form action="/admin-galeri/{{ $item->id }}" method="POST">

                                  <a href="/admin-galeri/{{ $item->id }}/edit" class="btn btn-primary text-light">ubah</a>

                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger text-light">hapus</button>
                              </form>
                          </td>
                        </tr>
                      </tr>
                      @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
@endsection