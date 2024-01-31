@extends('dashboard.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Update Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
        @if ($errors->any())
          <div>
            <ul>
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="card p-3">
          <form action="{{ route('profile.edit', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row">
              <div class="col">
                <label for="nama_user" class="form-label">Nama User</label>
                <input type="text" name="nama_user" value="{{ old('nama_user', $user->nama_user), }}" placeholder="Masukkan nama lengkap"
                  required class="form-control" />

                <label for="nomor_telpon" class="form-label">Nomor Telepon</label>
                <input name="nomor_telpon" value="{{ old('nomor_telpon', $user->nomor_telpon) }}" placeholder="Masukkan nomor telepon"
                  class="form-control" />

                <!-- alamat text areaa -->
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" placeholder="Masukkan alamat" rows="4" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>

                <label for="avatar" class="form-label">Avatar</label>
                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              </div>
              <div class="col">
                <!-- email input -->
                <label for="email" class="form-label">Email</label>
                <input name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan email" class="form-control" />

                <!-- username input -->
                <label for="username" class="form-label">Username</label>
                <input name="username" value="{{ old('username', $user->username) }}" placeholder="Masukkan username"
                  class="form-control" />

                <!-- password -->
                <hr>
                <div class="password mt-2">
                <label for="activatePassword">Ganti Password</label>
                <input type="checkbox" id="activatePassword" onchange="togglePassword()" class="ml-1"/>
                <input id="passwordInput" type="password" name="password" placeholder="Masukkan password" class="form-control" />

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        // Set initial state
                        togglePassword();
                    });
                
                    function togglePassword() {
                        var passwordInput = document.getElementById("passwordInput");
                        var activatePassword = document.getElementById("activatePassword");
                
                        passwordInput.disabled = !activatePassword.checked;
                    }
                </script>
                </div>

              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">
              Update User
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
