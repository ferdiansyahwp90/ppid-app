<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  
  <section class="section dashboard">
    <div class="row">
  
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
  
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
  
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
  
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
  
              <div class="card-body">
                <h5 class="card-title">Permintaan</h5>
  
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope-plus-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{count($total_permintaan)}}</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">57%</span> <span class="text-muted small pt-2 ps-1">process</span> --}}
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Sales Card -->
  
          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
  
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
  
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
  
              <div class="card-body">
                <h5 class="card-title">Selesai </h5>
  
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope-check-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{count($selesai)}}</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">43%</span> <span class="text-muted small pt-2 ps-1">finished</span> --}}
  
                  </div>
                </div>
              </div>
  
            </div>
          </div><!-- End Revenue Card -->
          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">
  
            <div class="card info-card customers-card">
  
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
  
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
  
              <div class="card-body">
                <h5 class="card-title">Pengguna </h5>
  
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{count($admin)}}</h6>
                    {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}
  
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Customers Card -->
  
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
  
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
  
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
  
              <div class="card-body">
                <h5 class="card-title">Permintaan Terkini <span>| Today</span></h5>
  
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
                            <td><span class="badge bg-{{$item->status == 'Sudah' ? 'success' : 'primary'}}">{{ $item->status}}</span></td>
  
                          </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" align="center">
                                Data Permintaan Informasi Kosong
                            </td>
                        </tr>
                    @endforelse
  
                  </tbody>
                </table>
  
              </div>
  
            </div>
          </div><!-- End Recent Sales -->
        </div>
      </div><!-- End Left side columns -->
  
    </div>
  </section>
  
</main><!-- End #main -->  