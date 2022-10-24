

<?php $__env->startSection('content'); ?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="text-center">
        <a href="<?php echo e(url('/')); ?>" class="h1">
            <img src="assets/img/login/sisurti-logo-login.png" alt="SISURTI" style="width:200px">
        </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg" id="coba">Masuk ke akun anda</p>
  
        <form action="<?php echo e(route('login')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <div class="input-group mb-3">
            <input id="login" name="login" type="text" class="form-control <?php echo e($errors->has('username') || $errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('username') ?: old('email')); ?>" placeholder="Email atau Username" required autofocus oninvalid="this.setCustomValidity('Mohon isi Username dan Email terlebih dahulu!')" oninput="setCustomValidity('')">

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <?php if($errors->has('username') || $errors->has('email')): ?>
              <span class="invalid-feedback">
                <strong><?php echo e($errors->first('username') ?: $errors->first('email')); ?></strong>
              </span>
            <?php endif; ?>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password-field" placeholder="Password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="false" oninvalid="this.setCustomValidity('Mohon isi Password terlebih dahulu')" oninput="setCustomValidity('')" >

            <div class="input-group-append">
              <div class="input-group-text">
                <span id="toggle-password" toggle="#password-field" class="fa fa-fw fa-eye-slash"></span>
              </div>
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
              </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="row">
            <div class="col-8">
                <p class="mb-1">
                    <a href="forgot-password.html" data-toggle="modal" data-target="#lupa-password">Saya lupa password</a>
                </p>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.card-body -->
      
        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="https://landakkab.go.id/">
            <img src="assets/img/sipaskal/logo_landak.png" alt="Pemda Kab. Landak" style="width:70px">
          </a>
          &nbsp; &nbsp; &nbsp; &nbsp;
          <a href="https://diskominfo.landakkab.go.id/">
            <img src="assets/img/login/diskominfolandak3.png" alt="Diskominfo Landak" style="width:200px">
          </a>
        </div>
        <!-- /.social-auth-links -->
      
    </div>
    <!-- /.card -->
  </div>
<!-- /.login-box -->

<div class="modal fade" id="lupa-password">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Lupa Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Hubungi&hellip;</p>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/auth/login.blade.php ENDPATH**/ ?>