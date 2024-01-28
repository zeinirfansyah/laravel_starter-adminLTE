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
            <div class="image">
                @if (auth()->user()->avatar)
                <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover">
              @else
              <img src="{{ asset('storage/avatars/default_avatar.jpg') }}" style="height: 50px; width: 50px; border-radius: 10px; object-fit: cover">
              @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->nama_user }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >
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
              
                <!-- manager role only -->
                @if(auth()->user()->role == 'manager')
                <li class="nav-header">Manager Only</li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User Manager</p>
                    </a>
                </li>
                @endif
                
                </li>
                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Link 11</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/dashboard.html" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Link 12</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link"
                    >
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Log out</p>
                    </a>

                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="d-none"
                    >
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
