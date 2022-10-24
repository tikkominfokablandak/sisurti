<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISURTI <?php echo $__env->yieldContent('title'); ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/adminlte.min.css')); ?>">

  <link href="<?php echo e(asset('assets/img/sipaskal/sipaskal-logo.png')); ?>" style="width: 32px" rel="icon">

  <!-- link custom icon -->
  <link href="https://file.myfontastic.com/osQDddESiraU8uVXBkRupT/icons.css" rel="stylesheet">

  <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $__env->yieldContent('header'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('assets/dist/js/adminlte.js')); ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo e(asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-mapael/jquery.mapael.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-mapael/maps/usa_states.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('assets/plugins/chart.js/Chart.min.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('assets/dist/js/pages/dashboard2.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->yieldPushContent('javascript-internal'); ?>

<?php echo $__env->make('errors.validation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/layouts/app.blade.php ENDPATH**/ ?>