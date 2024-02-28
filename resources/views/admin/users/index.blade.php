@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">User Management</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div>@includeif('admin.layouts.stat_cards')</div>
        <!-- filter and search -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('users.create') }}" class="btn btn-default">Add User</a>

                  <div class="card-tools">
                    <form method="GET" action="{{ route('users.index') }}" class="form-inline">
                      <div class="input-group input-group-sm" style="width: 300px">
                        <select name="role" class="form-control">
                          @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ request('role') == $role ? 'selected' : '' }}>
                              {{ ucfirst($role) }}
                            </option>
                          @endforeach
                        </select>
                        <input type="text" name="search" class="form-control ml-2" placeholder="Search"
                          value="{{ request('search') }}" />

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          <a
                            href="{{ route('users.index', ['sort_column' => 'role', 'sort_order' => $sortOrder == 'asc' && $sortColumn == 'role' ? 'desc' : 'asc']) }}">
                            Role
                          </a>
                        </th>
                        <th>
                          <a
                            href="{{ route('users.index', ['sort_column' => 'nama_user', 'sort_order' => $sortOrder == 'asc' && $sortColumn == 'nama_user' ? 'desc' : 'asc']) }}">
                            Nama User
                          </a>
                        </th>
                        <th>
                          <a
                            href="{{ route('users.index', ['sort_column' => 'no_telepon', 'sort_order' => $sortOrder == 'asc' && $sortColumn == 'no_telepon' ? 'desc' : 'asc']) }}">
                            Nomor Telepon
                          </a>
                        </th>
                        <th>
                          <a
                            href="{{ route('users.index', ['sort_column' => 'email', 'sort_order' => $sortOrder == 'asc' && $sortColumn == 'email' ? 'desc' : 'asc']) }}">
                            Email
                          </a>
                        </th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        @unless ($user->role == 'manager')
                          <tr>
                            <td>
                              {{ $user->role }}
                            </td>
                            <td>
                              {{ $user->nama_user }}
                            </td>
                            <td>
                              {{ $user->no_telepon }}
                            </td>
                            <td>
                              {{ $user->email }}
                            </td>
                            <td>
                              <a href="{{ route('users.detail', ['id' => $user->id]) }}" class="btn btn-default">Detail</a>

                              <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmationModal">
                                  Delete
                                </button>
                    
                                <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="confirmationModalLabel">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this user?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-danger">
                                                    Delete User
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </form>
                            </td>
                          </tr>
                        @endunless
                      @endforeach
                    </tbody>
                  </table>
                  <br />
                  <div class="mx-3">
                    {{ $users->appends(['sort_column' => $sortColumn, 'sort_order' => $sortOrder, 'search' => request('search'), 'role' => request('role')])->links('pagination::bootstrap-5') }}
                </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div>
    </div>
  </div>
@endsection
