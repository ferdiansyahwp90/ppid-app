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
              <h5 class="card-title">Data berita</h5>
              <a href="{{ url('admin-berita/create') }}" class="btn btn-primary py-2 px-3 fs-normal float-right mb-3 shadow-sm"></span>Tambah Data</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($berita as $item)    
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->name}}</td>
                          <td>{{ $item->deskripsi }}</td>
                          <td>{{ $item->tanggal }}</td>
                          <td>{{ $item->photo }}</td>
                          {{-- <td>
                            <img src="{{ asset('storage/'.$item->photo) }}" class="w-50" alt="">
                          </td> --}}
                          <td>{{ $item->link }}</td>
                          <td>
                            <form action="/admin-berita/{{ $item->id }}" method="POST">

                                <a href="/admin-berita/{{ $item->id }}/edit" class="btn btn-primary text-light">ubah</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-light">hapus</button>
                            </form>
                        </td>
                      </tr>
                      {{-- @empty
                      <tr>
                          <td colspan="4" align="center">
                              Data Berita Kosong
                          </td>
                      </tr> --}}
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