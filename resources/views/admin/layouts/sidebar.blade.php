<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-0">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">App Name</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image my-auto">
        @if (auth()->user()->avatar)
          <img src="{{ asset('storage/files/avatars/' . auth()->user()->avatar) }}"
            style="height: 60px; width: 60px; object-fit: cover;  border: 5px solid #d7d7d7; border-radius: 100%;"
            alt="{{ auth()->user()->avatar }}">
        @else
          <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png"
            alt="" srcset="" style="width: 60px; height: 60px; border-radius: 100%;">
        @endif
      </div>
      <div class="info">
        <strong class="d-block">{{ auth()->user()->nama_user }}</strong>
        <span class="d-block">{{ ucfirst(auth()->user()->role) }}</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin.home') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-header">Master</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Link 1</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cube"></i>
            <p>Link 2</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-id-card"></i>
            <p>Link 3</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-truck"></i>
            <p>Link 4</p>
          </a>
        </li>
        <li class="nav-header">Transaksi</li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-money-bill"></i>
            <p>Link 5</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-download"></i>
            <p>Link 6</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-upload"></i>
            <p>Link 7</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-cart-arrow-down"></i>
            <p>Link 8</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-cart-arrow-down"></i>
            <p>Link 9</p>
          </a>
        </li>
        <li class="nav-header">Reports</li>
        <li class="nav-item">
          <a href="pages/dashboard.html" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Link 10</p>
          </a>
        </li>

        <!-- superadmin role only -->
        @if (auth()->user()->role == 'superadmin')
          <li class="nav-header">Superadmin Only</li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>User Management</p>
            </a>
          </li>
        @endif

        </li>
        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="{{ route('profile.show') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Log out</p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
