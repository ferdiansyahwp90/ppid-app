@extends('pemohon.home.index')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">{{ $title ?? '' }}</h4>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex align-items-center justify-content-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title ?? '' }}</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <div class="col-lg-8 col-xlg-9 offset-md-3 mt-4">
      <div class="card px-2 py-2">
        <div class="card-title">
            Profile
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                {{session('error')}}
                </div>
            @endif
          <form action="{{route('updateProfile')}}" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{ auth()->user()->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control " required>
                {{-- result error --}}
                @error('password')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password Konfirmasi</label>
                <input type="password" name="password_confirmation" id="" class="form-control" required>
                @error('password_confirmation')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>

</div>
@endsection
