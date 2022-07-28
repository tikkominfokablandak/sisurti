<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('assets/img/sipaskal/sipaskal-logo.png') }}" alt="SIPASKAL Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">S I P A S K A L</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('assets/img/profil/'.Auth::user()->foto) }}" style="width:35px" class="img-circle elevation-2" alt="{{ Auth::user()->nama }}">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ ( (request()->is('dashboard')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          @if(auth()->user()->id_role == 1)
          <li class="nav-item {{ ( (request()->is('users*')) or (request()->is('opd*')) or (request()->is('unitkerja*')) or (request()->is('jabatan*')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ ( (request()->is('users*')) or (request()->is('opd*')) or (request()->is('unitkerja*')) or (request()->is('jabatan*')) ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Administrasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('opd.index') }}" class="nav-link {{ (request()->is('opd*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unitkerja.index') }}" class="nav-link {{ (request()->is('unitkerja*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jabatan.index') }}" class="nav-link {{ (request()->is('jabatan*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>