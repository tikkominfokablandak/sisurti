

<?php $__env->startSection('title'); ?>
    | Surat Masuk #<?php echo e($suratmasuk->id); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Surat Masuk #<?php echo e($suratmasuk->id); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('/surat-masuk')); ?>">Surat Masuk</a></li>
            <li class="breadcrumb-item active">Surat Masuk #<?php echo e($suratmasuk->id); ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
    <div class="container-fluid">
        <?php if( $suratmasuk->id_status == 1 ): ?>
            <div class="callout callout-warning">
                <h5><b>Surat belum dikirim ke Kepala OPD</b></h5>

                <p><?php echo e(date('j M Y H:i:s', strtotime($suratmasuk->created_at))); ?></p>
            </div>
        <?php elseif( $suratmasuk->id_status == 2 ): ?>
            <div class="callout callout-success">
                <h5><b>Surat sudah dikirim ke Kepala OPD</b></h5>

                <p><?php echo e(date('j M Y H:i:s', strtotime($suratmasuk->created_at))); ?></p>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-2">
                <a href="<?php echo e(URL::to('/surat-masuk')); ?>">
                    <button type="button" class="btn btn-block btn-default">
                        <i class="fas fa-chevron-circle-left"></i> &nbsp; Kembali
                    </button>
                </a>
            </div>
            <?php if( $suratmasuk->id_status == 1 ): ?>
                <div class="col-2">
                    <a href="<?php echo e(URL::to('/surat-masuk/'.$suratmasuk->id.'/edit')); ?>">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit &nbsp; <i class="fa fa-edit"></i> 
                        </button>
                    </a>
                </div>
                <div class="col-2">
                    <form method="POST" action="<?php echo e(route('sm.kirim', [$suratmasuk->id])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-block btn-info">
                            Kirim &nbsp; <i class="fas fa-share"></i>
                        </button>
                    </form>
                </div>
            <?php elseif( $suratmasuk->id_status == 2 ): ?>
                <div class="col-2">
                    <button type="button" class="btn btn-block btn-warning" disabled>
                        Edit &nbsp; <i class="fa fa-edit"></i> 
                    </button>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-block btn-info" disabled>
                        Kirim &nbsp; <i class="fas fa-share"></i>
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Surat Masuk dari :
                        </h3>
                    </div>

                    <div class="card-body">
                        <h5><b><?php echo e($suratmasuk->nama_pengirim); ?></b> <?php echo e($suratmasuk->jabatan_pengirim); ?> - <?php echo e($suratmasuk->instansi_pengirim); ?></h5>

                        <div class="row">
                            <div class="col-md-4">
                                <dl>
                                    <dt>Nomor Surat</dt>
                                    <dd><?php echo e($suratmasuk->no_surat); ?></dd>
                                    <dt>Tanggal Surat</dt>
                                    <dd><?php echo e(date('j M Y', strtotime($suratmasuk->tgl_surat))); ?></dd>
                                </dl>
                            </div>
                            
                            <div class="col-md-8">
                                <dl>
                                    <dt>Hal</dt>
                                    <dd><?php echo e($suratmasuk->perihal); ?></dd>
                                    <dt>Isi Ringkas</dt>
                                    <dd><?php echo e($suratmasuk->isi); ?></dd>
                                </dl>
                            </div>
                        </div>

                        <div id="accordion">
                            <div class="card card-default">
                                <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                        <i class="nav-icon fas fa-file-alt"></i>
                                    Detail Surat
                                    </a>
                                </h4>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Jenis Surat</dt>
                                                    <dd class="col-sm-9"><?php echo e($suratmasuk->jenis_surat); ?></dd>
                                                    <dt class="col-sm-3">Sifat Surat</dt>
                                                    <dd class="col-sm-9"><?php echo e($suratmasuk->sifat_surat); ?></dd>
                                                    <dt class="col-sm-3">Tingkat Urgensi</dt>
                                                    <dd class="col-sm-9"><?php echo e($suratmasuk->tingkat_urgen); ?></dd>
                                                    
                                                </dl>
                                            </div>
                                            
                                            <div class="col-md-7">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Diterima pada</dt>
                                                    <dd class="col-sm-9"><?php echo e(date('j M Y', strtotime($suratmasuk->tgl_diterima))); ?></dd>
                                                    <dt class="col-sm-3">Diregistrasikan pada</dt>
                                                    <dd class="col-sm-9"><?php echo e(date('j M Y H:i:s', strtotime($suratmasuk->created_at))); ?></dd>
                                                    <dt class="col-sm-3">Diregistrasikan oleh</dt>
                                                    <dd class="col-sm-9"><?php echo e($suratmasuk->nama); ?></dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Riwayat Tindak Lanjut</h3>
                  </div>
                  <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Dilakukan oleh</th>
                                    <th>Kepada</th>
                                    <th>Pesan Disposisi / Koordinasi</th>
                                    <th>Instruksi / Pesan Tambahan</th>
                                    <th>Tanggal Disposisi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $disposisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->nama); ?> - <?php echo e($item->nama_jabatan); ?></td>
                                    <td><?php echo e($item->id_disp_ke); ?></td>
                                    <td><?php echo e($item->disp_ket); ?></td>
                                    <td><?php echo e($item->disp_note_kadis); ?></td>
                                    <td><?php echo e($item->tgl_disp); ?></td>
                                    <td align="center">
                                        <?php if( $item->id_status == 1 ): ?>
                                          <span class="badge bg-success">Konsep</span>
                                        <?php elseif( $item->id_status == 2 ): ?>
                                          <span class="badge bg-warning">Terkirim</span>
                                        <?php elseif( $item->id_status == 3 ): ?>
                                          <span class="badge bg-warning">Belum Dibaca</span>
                                        <?php elseif( $item->id_status == 4 ): ?>
                                          <span class="badge bg-success">Sudah Dibaca</span>
                                        <?php elseif( $item->id_status == 5 ): ?>
                                          <span class="badge bg-warning">Disposisi</span>
                                        <?php elseif( $item->id_status == 6 ): ?>
                                          <span class="badge bg-warning">Tindak Lanjut</span>
                                        <?php elseif( $item->id_status == 7 ): ?>
                                          <span class="badge bg-success">Selesai</span>
                                        <?php elseif( $item->id_status == 8 ): ?>
                                          <span class="badge bg-warning">Belum Verifikasi</span>
                                        <?php elseif( $item->id_status == 9 ): ?>
                                          <span class="badge bg-success">Sudah Verifikasi</span>
                                        <?php elseif( $item->id_status == 10 ): ?>
                                          <span class="badge bg-warning">Belum Tandatangan</span>
                                        <?php elseif( $item->id_status == 11 ): ?>
                                          <span class="badge bg-success">Sudah Tandatangan</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Histori Surat</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">Tanggal</th>
                            <th>Pengirim</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Jenis Surat</th>
                            <th>Hal</th>
                            <th width="10">File</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $log_surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(date('l d M Y H:i:s', strtotime($item->created_at))); ?></td>
                            <td><b><?php echo e($item->nama_pengirim); ?></b></td>
                            <td><?php echo e($item->jabatan_pengirim); ?> - <?php echo e($item->instansi_pengirim); ?></td>
                            <td>
                                <b><?php echo e($item->nama); ?></b> - <?php echo e($item->nama_jabatan); ?> - <?php echo e($item->nama_opd); ?>

                                <?php if( $item->read == "READ" ): ?>
                                    <span class="badge bg-success">SUDAH DIBACA</span>
                                <?php elseif( $item->read == "UNREAD" ): ?>
                                    <span class="badge bg-warning">BELUM DIBACA</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->jenis_surat); ?></td>
                            <td><?php echo e($item->perihal); ?></td>
                            <td align="center">
                                <a href="<?php echo e(route('sm.file', $item->file_surat)); ?>">
                                    <i class="far fa-file-pdf"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/adminsurat/suratmasuk/detail.blade.php ENDPATH**/ ?>