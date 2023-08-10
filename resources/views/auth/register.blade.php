@extends('layouts.firstpage')

@section('content')
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
        <div class="px-5 py-5 ms-xl-4">
      <div class="col-sm-6 text-black">
        <div class="text-center">
            <span class="h1 fw-bold mb-0 text-secondary">PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI<span class="text-warning"> <p>KABUPATEN PROBOLINGGO</span></span>
          </div>

        <div class="d-flex align-items-center py-4 px-5 ms-xl-4">
        
          <form method="POST" action="{{ route('register') }}" class="w-100">
            @csrf

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">REGISTER</h3>
  
            <div class="form-outline mb-4">
              <label class="form-label" for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control form-control-lg  @error('name') is-invalid @enderror" />
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="email">Email address</label>
              <input type="text" id="email" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" />
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="password_confirmation">Password Confirmation</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" />
              @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-dark px-5 btn-lg btn-block text-white" type="submit">Register</button>
            </div>

            <p>Already have an account? <a href="/login" class="link-info">Login here</a></p>
            <a href="/" class="link-info text-decoration-none">Kembali ke Home</a>
            
          </form>

        </div>

      </div>
      </div>
    </div>
  </div>
</section>
@endsection