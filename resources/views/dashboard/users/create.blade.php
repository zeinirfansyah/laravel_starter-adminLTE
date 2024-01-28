@extends('dashboard.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">User <amage,emt< /li>
              <li class="breadcrumb-item active">Create User</li>
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
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <label for="nama_user" class="form-label">Nama User</label>
              <input type="text" name="nama_user" value="{{ old('nama_user') }}" required class="form-control" />

              <label for="nomor_telpon" class="form-label">Nomor Telepon</label>
              <input name="nomor_telpon" value="{{ old('nomor_telpon') }}" class="form-control" />

              <!-- email input -->
              <label for="email" class="form-label">Email</label>
              <input name="email" value="{{ old('email') }}" class="form-control" />

              <!-- alamat text areaa -->
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" rows="3">{{ old('alamat') }}</textarea>

              <!-- username input -->
              <label for="username" class="form-label">Username</label>
              <input name="username" value="{{ old('username') }}" class="form-control" />

              <!-- password input -->
              <label for="password" class="form-label">Password</label>
              <input name="password" type="password" value="{{ old('username') }}" class="form-control" />

              <!-- role dropdown -->
              <label for="role" class="form-label">Role</label>
              <select name="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>

              <button type="submit" class="btn btn-primary mt-2">
                Create User
              </button>
            </form>
          </div>

      </div>

    </div>
  </div>
@endsection