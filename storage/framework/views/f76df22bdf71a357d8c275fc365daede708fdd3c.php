

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
                <h3 class="card-title">Administrasi</h3>

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
                <h3><?php echo e(number_format($opd)); ?></h3>
                
                

                <p>O P D</p>
              </div>
              <div class="icon">
              <i class="fas fa-landmark"></i>
              </div>
              <a href="<?php echo e(route('opd.index')); ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light color-palette">
              <div class="inner">
                <h3><?php echo e(number_format($unitkerja)); ?></h3>

                <p>Unit Kerja</p>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="<?php echo e(route('unitkerja.index')); ?>" class="small-box-footer">
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

                <p>jabatan</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-tie"></i>
              </div>
              <a href="<?php echo e(route('jabatan.index')); ?>" class="small-box-footer">
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

                <p>Pengguna</p>
              </div>
              <div class="icon">
              <i class="fas fa-user"></i>
              </div>
              <a href="<?php echo e(route('users.index')); ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer" style="display: block;">
                Total isian pada menu "Administrasi"
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/adminkab/index.blade.php ENDPATH**/ ?>