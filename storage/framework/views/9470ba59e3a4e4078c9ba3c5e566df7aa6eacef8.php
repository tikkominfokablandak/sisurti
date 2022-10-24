<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('/')); ?>" class="brand-link">
      <img src="<?php echo e(asset('assets/img/sipaskal/sisurti-logo.png')); ?>" alt="SISURTI Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">S I S U R T I</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(url('assets/img/profil/'.Auth::user()->foto)); ?>" style="width:35px" class="img-circle elevation-2" alt="<?php echo e(Auth::user()->nama); ?>">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(Auth::user()->nama); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link <?php echo e(( (request()->is('dashboard')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <?php if(auth()->user()->id_role == 1): ?>
          <li class="nav-item <?php echo e(( (request()->is('users*')) or (request()->is('opd*')) or (request()->is('unitkerja*')) or (request()->is('jabatan*')) ) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(( (request()->is('users*')) or (request()->is('opd*')) or (request()->is('unitkerja*')) or (request()->is('jabatan*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Administrasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('opd.index')); ?>" class="nav-link <?php echo e((request()->is('opd*')) ? 'active' : ''); ?>">
                <i class="fas fa-landmark"></i>
                  <p>OPD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('unitkerja.index')); ?>" class="nav-link <?php echo e((request()->is('unitkerja*')) ? 'active' : ''); ?>">
                <i class="fas fa-users-cog"></i>
                  <p>Unit Kerja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('jabatan.index')); ?>" class="nav-link <?php echo e((request()->is('jabatan*')) ? 'active' : ''); ?>">
                <i class="fas fa-user-tie"></i>
                  <p>Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php echo e((request()->is('users*')) ? 'active' : ''); ?>">
                <i class="fas fa-user"></i>
                  <p>Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->id_role == 3): ?>
          <li class="nav-item <?php echo e(( (request()->is('surat-masuk*')) or (request()->is('surat-keluar*')) or (request()->is('surat-disposisi*')) ) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(( (request()->is('surat-masuk*')) or (request()->is('surat-keluar*')) or (request()->is('surat-disposisi*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Surat Dinas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('surat-masuk.create')); ?>" class="nav-link <?php echo e(( (request()->is('surat-masuk/create')) ) ? 'active' : ''); ?>">
                  <i class="fas fa-file-signature"></i>
                  <p>Registrasi Surat Masuk</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('surat-masuk.index')); ?>" class="nav-link <?php echo e(( (request()->is('surat-masuk')) ) ? 'active' : ''); ?>">
                  <i class="fas fa-envelope"></i>
                  <p>Daftar Surat Masuk</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('surat-disposisi.index')); ?>" class="nav-link <?php echo e(( (request()->is('surat-disposisi*')) ) ? 'active' : ''); ?>">
                  <i class="fas icon-file-check-2"></i>
                  <p>Disposisi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php echo e(( (request()->is('log-surat-masuk*')) or (request()->is('log-surat-keluar*')) or (request()->is('log-disposisi*')) ) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(( (request()->is('log-surat-masuk*')) or (request()->is('log-surat-keluar*')) or (request()->is('log-disposisi*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Log Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('log-surat-masuk.index')); ?>" class="nav-link <?php echo e(( (request()->is('log-surat-masuk*')) ) ? 'active' : ''); ?>">
                  <i class="fas fa-envelope-open-text"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('log-disposisi.index')); ?>" class="nav-link <?php echo e(( (request()->is('log-disposisi*')) ) ? 'active' : ''); ?>">
                  <i class="fas icon-file-check-2"></i>
                  <p>Disposisi</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php echo e(( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) or (request()->is('template-surat*')) ) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) or (request()->is('template-surat*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('template-surat.index')); ?>" class="nav-link <?php echo e(( (request()->is('template-surat')) ) ? 'active' : ''); ?>">
                <i class="fas fa-file-upload"></i>
                  <p>Template Surat</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('tujuan.index')); ?>" class="nav-link <?php echo e(( (request()->is('daftar-tujuan*')) ) ? 'active' : ''); ?>">
                <i class="fas fa-users"></i>
                  <p>Daftar Tujuan</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('daftar-tembusan.index')); ?>" class="nav-link <?php echo e(( (request()->is('daftar-tembusan*')) ) ? 'active' : ''); ?>">
                <i class="fas fa-user-tag"></i>
                  <p>Daftar Tembusan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->id_role == 4): ?>
          
          <li class="nav-item">
            <a href="/suratmasuk" class="nav-link <?php echo e(( (request()->is('suratmasuk*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Daftar Surat Masuk
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/disposisi" class="nav-link <?php echo e(( (request()->is('disposisi*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas icon-file-check-2"></i>
              <p>
                Daftar Disposisi
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/tindak-lanjut" class="nav-link <?php echo e(( (request()->is('tindak-lanjut*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Tindak Lanjut
              </p>
            </a>
          </li>
          <?php endif; ?>


          
          <?php if(auth()->user()->id_role == 5): ?>
          <li class="nav-item <?php echo e(( (request()->is('surat-masuk*')) or (request()->is('naskah-keluar*')) or (request()->is('surat-disposisi*')) or (request()->is('template-naskah*')) ) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(( (request()->is('surat-masuk*')) or (request()->is('naskah-keluar*')) or (request()->is('surat-disposisi*'))  or (request()->is('template-naskah*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Naskah Dinas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo e(route('naskah-keluar.create')); ?>" class="nav-link <?php echo e(( (request()->is('naskah-keluar/create')) ) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Naskah Keluar</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('naskah-keluar.index')); ?>" class="nav-link <?php echo e(( (request()->is('naskah-keluar')) ) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Naskah Keluar</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('template-naskah.index')); ?>" class="nav-link <?php echo e(( (request()->is('template-naskah')) ) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Template Naskah</p>
                </a>
              </li>
            </ul>
          </li>

          

          <li class="nav-item <?php echo e(( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) ) ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(( (request()->is('daftar-penandatangan*')) or (request()->is('daftar-verifikator*')) or (request()->is('daftar-tujuan*')) or (request()->is('daftar-grup-tujuan*')) or (request()->is('daftar-tembusan*')) ) ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('daftar-penandatangan.index')); ?>" class="nav-link <?php echo e(( (request()->is('daftar-penandatangan*')) ) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Penandatangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('daftar-verifikator.index')); ?>" class="nav-link <?php echo e(( (request()->is('daftar-verifikator*')) ) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Verifikator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('tujuan.index')); ?>" class="nav-link <?php echo e(( (request()->is('daftar-tujuan*')) ) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tujuan</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo e(route('daftar-tembusan.index')); ?>" class="nav-link <?php echo e(( (request()->is('daftar-tembusan*')) ) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tembusan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>