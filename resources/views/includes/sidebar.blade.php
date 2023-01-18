<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ url('assets/dist/img/logo.png') }}" alt="Logo Dspring Kost" class="brand-image">
        <span class="brand-text">D'Spring Kos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item active ">
                    <a href="{{ route('dashboard-admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p class="ml-2">
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a href="{{ route('kamar') }}" class="nav-link {{ request()->is('*/kamar*')  ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p class="ml-2">
                            Kamar
                        </p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a href="{{ route('reservasi') }}" class="nav-link {{ request()->is('*/reservasi*') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p class="ml-2">
                            Reservasi
                        </p>
                    </a>
                </li>
                <li class="nav-item active ">
                    <a href="{{ route('pembayaran-admin') }}" class="nav-link {{ request()->is('*/pembayaran*') ? 'active' : ''  }}">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p class="ml-2">
                            Pembayaran
                        </p>
                    </a>
                </li>
               
                <li class="nav-item h-100">
                    <a href="{{ route('logout') }}" class="nav-link"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"> <i class="nav-icon fas fa-sign-out-alt"></i>
                                                    <p class="ml-2">{{ __('Logout') }}</p> 
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
