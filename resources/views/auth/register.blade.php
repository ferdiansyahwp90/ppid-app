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
                  <label class="form-label" for="email">Email address</label>
                  <input type="email" id="email" name="email" class="form-control form-spacer-25x20 rad-10 fs-normal  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"/>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-outline mb-4 d-none">
                  <label class="form-label" for="role_id">Role</label>
                  <select name="role_id" id="role_id" class="form-control rad-10 @error('role_id') is-invalid @enderror">
                    <option value="2">Pemohon</option>
                  </select>
                  @error('role_id')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control form-spacer-25x20 rad-10 fs-normal @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"/>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="password_confirmation">Password Confirmation</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-spacer-25x20 rad-10 fs-normal @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password_confirmation" placeholder="Password Confirmation"/>
                  @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-check mb-3 fs-normal">
                  <input class="form-check-input" name="remember" id="inputRememberPassword" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                  <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                </div>

                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">    
                  <a class="small color-primary text-decoration-none" href="/login">
                      <span class="fas fa-arrow-left px-2"></span>
                      {{ __('Login') }}
                  </a>
                  <button type="submit" class="btn btn-primary py-2 px-5 rad-10 font-medium">
                      {{ __('Register') }}
                  </button>
                </div>
            </form>

        </div>

      </div>
      </div>
    </div>
  </div>
</section>
@endsection