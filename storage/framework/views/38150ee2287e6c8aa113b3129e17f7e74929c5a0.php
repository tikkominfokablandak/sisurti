

<?php $__env->startSection('content'); ?>

&nbsp

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
			<div class="card">
              <div class="card-body">
              	<!-- <i class="nav-icon fas fa-home"</i> -->
                <h5 class="card-title">Beranda - Selamat Datang, <b><?php echo e(Auth::user()->nama); ?></b> !</h5>

                <!-- <p class="card-text">
                   
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
              </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header"> <!-- style="text-align:center" -->
                <h3 class="card-title">Surat Dinas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>65</h3>

                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <a href="<?php echo e(route('surat-masuk.index')); ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="fas fa-paper-plane"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>44</h3>

                <p>Registrasi Surat</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-signature"></i>
              </div>
              <a href="<?php echo e(route('surat-masuk.create')); ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>65</h3>

                <p>Disposisi Surat</p>
              </div>
              <div class="icon">
                <i class="fas icon-file-check-2"></i>
              </div>
              <a href="<?php echo e(route('surat-disposisi.index')); ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer" style="display: block;">
                Total status Surat keluar dan Surat masuk pada menu "Surat DINAS"
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header"> <!-- style="text-align:center" -->
                <h3 class="card-title">Log Surat</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>150</h3>

                <p>Log Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <a href="<?php echo e(route('log-surat-masuk.index')); ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="fas fa-paper-plane"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>65</h3>

                <p>Disposisi Surat</p>
              </div>
              <div class="icon">
                <i class="fas icon-file-check-2"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer" style="display: block;">
                Total status Surat keluar dan Surat masuk pada menu "LOG Surat"
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header"> <!-- style="text-align:center" -->
                <h3 class="card-title">Pengaturan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>150</h3>

                <p>Template Surat</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-upload"></i>
              </div>
              <a href="<?php echo e(route('template-surat.index')); ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Daftar Tujuan</p>
              </div>
              <div class="icon">
                <i class="fas fa-paper-plane"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3>65</h3>

                <p>Daftar Tembusan</p>
              </div>
              <div class="icon">
                <i class="fas icon-file-check-2"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer" style="display: block;">
                Pengaturan
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/adminsurat/index.blade.php ENDPATH**/ ?>