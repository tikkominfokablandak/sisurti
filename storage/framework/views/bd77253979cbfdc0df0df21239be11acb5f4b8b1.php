

<?php $__env->startSection('title'); ?>
    | Daftar Surat Masuk
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
          <h1 class="m-0">Surat Masuk - Daftar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Surat Masuk</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Surat</th>
                  <th>Nomor Surat</th>
                  <th>Hal</th>
                  <th>Asal Surat</th>
                  <th>Tingkat Urgensi</th>
                  <th width="15">Status</th>
                  <th width="10">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $suratmasuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($item->tgl_surat); ?></td>
                  <td><?php echo e($item->no_surat); ?></td>
                  <td><?php echo e($item->perihal); ?></td>
                  <td><?php echo e($item->instansi_pengirim); ?></td>
                  <td><?php echo e($item->tingkat_urgen); ?></td>
                  <td align="center">
                    <?php if( $item->id_status == 1 ): ?>
                      <span class="badge bg-success">Konsep</span>
                    <?php elseif( $item->id_status == 2 ): ?>
                      <span class="badge bg-green">Terkirim</span>
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
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary btn-block dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="<?php echo e(url('surat-masuk/'.$item->id)); ?>" style="color:blue">
                            <i class="fa fa-info-circle"></i>
                              Detail
                          </a>
                          <?php if( $item->id_status == 1 ): ?>
                          <a class="dropdown-item" href="<?php echo e(url('surat-masuk/'.$item->id.'/edit')); ?>" style="color:#ffc107">
                            <i class="fa fa-edit"></i>
                              Edit
                          </a>
                          <?php elseif( $item->id_status == 2 ): ?>
                          
                          <?php endif; ?>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/adminsurat/suratmasuk/index.blade.php ENDPATH**/ ?>