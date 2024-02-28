@extends('admin.layouts.master') @section('content')
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
              <li class="breadcrumb-item">User Management</li>
              <li class="breadcrumb-item active">Detail User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
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
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h3>{{ $user->nama_user }}</h3>
              <strong class="alert alert-info px-2 py-1">{{ $user->role }}</strong>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                      <th>Username</th>
                      <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                      <th>Nomor Telepon</th>
                      <td>{{ $user->no_telepon }}</td>
                    </tr>
                    <tr>
                      <th>Alamat</th>
                      <td class="text-break">{{ $user->alamat }}</td>
                    </tr>
                  </table>
              </div>
              <div class="col">
                <div class="d-flex justify-content-center">
                  <div class="image">
                    <div class="row">
                      <div class="col">
                       <!-- show avatar if exist -->
                       @if ($user->avatar)
                       <img src="{{ asset('storage/files/avatars/' . $user->avatar) }}" class="img-fluid rounded"
                       style="height: 300px; width: 200px; object-fit: cover;  border: 5px solid #d7d7d7;" alt="{{ $user->avatar }}">
                       @else
                       <img
                          src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
                          alt="" srcset="" style="width: 200px; height: 200px; border-radius: 100%;">
                       @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <p class="text-center">{{ $user->nama_user }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="{{ route('users.update', ['id' => $user->id]) }}" class="btn btn-primary">Edit Data</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
