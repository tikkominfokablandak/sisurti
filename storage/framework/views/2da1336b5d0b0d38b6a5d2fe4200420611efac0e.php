<?php if($errors->count() > 0): ?>
<div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($error); ?><br/>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>

<!-- Alert untuk Error Validation -->
<script>
  var has_errors = <?php echo e($errors->count() > 0 ? 'true' : 'false'); ?>;
  
  if ( has_errors ){
      Swal.fire({
          title: 'Gagal menyimpan data!',
          icon: 'error',
          html: jQuery("#ERROR_COPY").html(),
          showCloseButton: true,
          timer: 5000,
          timerProgressBar: true,
      })
  }
</script><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/errors/validation.blade.php ENDPATH**/ ?>