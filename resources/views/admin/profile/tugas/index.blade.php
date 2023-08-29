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
              <h5 class="card-title">Tugas dan Fungsi PPID</h5>
              <a href="{{ url('admin-tugas/create') }}" class="btn btn-primary py-2 px-3 fs-normal float-right mb-3 shadow-sm"></span>Tambah Data</a>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($tugas as $item)    
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{!! $item->deskripsi !!}</td>
                          <td>
                            <form action="/admin-tugas/{{ $item->id }}" method="post">

                                <a href="/admin-tugas/{{ $item->id }}/edit" class="btn btn-primary text-light">ubah</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-light">hapus</button>
                            </form>
                        </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="4" align="center">
                              Tugas dan Fungsi PPID Kosong
                          </td>
                      </tr>
                  @endforelse
                  
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