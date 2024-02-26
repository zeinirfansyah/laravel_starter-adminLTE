@extends('layouts.app') @section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf

              <div class="row  ">
                <div class="col-md-6  mb-2">
                  <input id="nama_user" type="text" class="form-control @error('nama_user') is-invalid @enderror"
                    name="nama_user" value="{{ old('nama_user') }}" required autocomplete="nama_user" autofocus
                    placeholder="Nama Lengkap" />

                  @error('nama_user')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6  mb-2">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                    placeholder="Username" />

                  @error('username')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row  ">
                <div class="col-md-6  mb-2">
                  <input id="no_telepon" type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                    name="no_telepon" value="{{ old('no_telepon') }}" required autocomplete="no_telepon" autofocus
                    placeholder="Nomor Telepon" />

                  @error('no_telepon')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-6  mb-2">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email"
                    placeholder="Email Address" />

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row  ">
                <div class="col-md-12 mb-2">
                  <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                    value="{{ old('alamat') }}" required autocomplete="alamat" autofocus placeholder="Alamat"></textarea>

                  @error('alamat')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row  ">
                <div class="col-md-12 mb-2">
                  <label for="avatar" id="avatar-label" class="form-label"
                    style="background-color: #ffffffaa; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer; width: 100%;  border: 1px solid #d7d7d7; box-shadow: inset 0 2px 3px 0 #0000000a">
                    Upload Avatar
                  </label>
                  <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror"
                    name="avatar" style="display: none;" onchange="updateLabelText(this)">
                  @error('avatar')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <script>
                  function updateLabelText(input) {
                      var label = document.getElementById('avatar-label');
                      var fileName = input.value.split('\\').pop(); // Get the file name
                      label.innerText = `Foto Terpilih : ${fileName}`;
              
                      // Change background color
                      label.style.backgroundColor = '#d1fff373'; // Replace with your desired color code
                  }
              </script>

              </div>

              <div class="row  ">
                <div class="col-md-12 mb-2">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Password" />

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row  ">
                <div class="col-md-12 mb-2">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Konfirmasi Password" />
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-12 mb-2">
                  <button type="submit" class="btn btn-primary w-100">
                    {{ __('Register') }}
                  </button>
                </div>
                <div class="col-md-12 mb-2">
                  <!-- have an account -->
                  <p>
                    
                    <a href="{{ route('login') }}">
                      {{ __(' Sudah punya akun?') }}
                    </a>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
