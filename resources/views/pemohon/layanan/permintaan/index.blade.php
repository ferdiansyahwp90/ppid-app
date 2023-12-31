@php
  $url = auth()->user()->role_id == 1 ? 'admin.elements.firstpage' : 'pemohon.home.index';
@endphp

@extends($url)
@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>PERMINTAAN INFORMASI / PEMOHON </h1>
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
            <div class="card-body">
              <h5 class="card-title">Permintaan Informasi</h5>
              @if (auth()->user()->role_id != 1)
                <a href="{{ url('/pemohon-permintaan/create') }}" class="btn btn-primary py-2 px-3 fs-normal float-right mb-3 shadow-sm"></span>Tambah Data</a>
              @endif

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. KTP/SIM/Paspor:</th>
                    <th scope="col">Pekerjaan:</th>
                    <th scope="col">No. Telp:</th>
                    <th scope="col">Email</th>
                    <th scope="col">Detail Informasi Yang Dibutuhkan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($permintaan as $item)    
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->noidentitas }}</td>
                          <td>{{ $item->pekerjaan }}</td>
                          <td>{{ $item->notelp }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->detailinfo}}</td>
                          <td>{{ $item->status}}</td>
                          <td>
                            @if (auth()->user()->role_id != 1)
                              <a href="{{isset($url) ? $url : "`/pemohon-permintaan/`"}}{{ $item->id }}/edit" class="btn btn-primary text-light">UBAH</a>
                              <form action="{{isset($url) ? $url : "`/pemohon-permintaan/`"}}{{ $item->id }}" method="post" class="mt-2">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger text-light">HAPUS</button>
                              </form>
                              @else
                              {{-- button confirm and reject --}}
                              @if ($item->status == 'Sudah')
                                  Sudah Diterima
                              @else
                                  <form action="{{ route('admin-pemohon-permintaan.updateStatus', $item->id) }}" method="post" class="mt-2">
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="status" value="Sudah">
                                      <button type="submit" class="btn btn-success text-light">CONFIRM</button>
                                  </form>
                              @endif
                            @endif
                      </tr>
                      @empty
                      <tr>
                          <td colspan="4" align="center">
                              Data Permintaan Informasi Kosong
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