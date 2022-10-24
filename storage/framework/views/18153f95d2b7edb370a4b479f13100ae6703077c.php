

<?php $__env->startSection('title'); ?>
    | Buat Surat Baru
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Registrasi Surat Masuk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('/surat-masuk')); ?>">Surat Masuk</a></li>
            <li class="breadcrumb-item active">Registrasi Surat Masuk</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">IDENTITAS PENGIRIM SURAT</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form method="POST" action="<?php echo e(route('surat-masuk.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="username"><?php echo e(__('Nama Pengirim')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="nama_pengirim" type="text" class="form-control form-control <?php $__errorArgs = ['nama_pengirim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukan Nama Pengirim ..." name="nama_pengirim" value="<?php echo e(old('nama_pengirim')); ?>" required autocomplete="username" autofocus oninvalid="this.setCustomValidity('Mohon isi Nama Pengirim terlebih dahulu!')" oninput="setCustomValidity('')">

                                <?php $__errorArgs = ['nama_pengirim'];
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

                            <div class="form-group">
                                <label for="jabatan_pengirim"><?php echo e(__('Jabatan Pengirim')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="jabatan_pengirim" type="text" class="form-control form-control <?php $__errorArgs = ['jabatan_pengirim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukan Jabatan Pengirim ..." name="jabatan_pengirim" value="<?php echo e(old('jabatan_pengirim')); ?>" required autocomplete="jabatan_pengirim" autofocus oninvalid="this.setCustomValidity('Mohon isi Jabatan Pengirim terlebih dahulu!')" oninput="setCustomValidity('')">

                                <?php $__errorArgs = ['jabatan_pengirim'];
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

                            <div class="form-group">
                                <label for="instansi_pengirim"><?php echo e(__('Instansi Pengirim')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="instansi_pengirim" type="text" class="form-control form-control <?php $__errorArgs = ['instansi_pengirim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukan Instansi Pengirim ..." name="instansi_pengirim" value="<?php echo e(old('instansi_pengirim')); ?>" required autocomplete="instansi_pengirim" autofocus oninvalid="this.setCustomValidity('Mohon isi Instansi Pengirim terlebih dahulu!')" oninput="setCustomValidity('')">

                                <?php $__errorArgs = ['instansi_pengirim'];
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
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            
                <div class="card-header">
                    <h3 class="card-title">DETAIL ISI SURAT</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="jenis_surat"><?php echo e(__('Jenis Surat')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="jenis_surat" class="form-control form-control-sm <?php $__errorArgs = ['jenis_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="width: 100%;" name="id_jenissurat" required oninvalid="this.setCustomValidity('Mohon pilih jenis surat dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $jenissurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->jenis_surat); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sifat_surat"><?php echo e(__('Sifat Surat')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="sifat_surat" class="form-control form-control-sm <?php $__errorArgs = ['sifat_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="width: 100%;" name="sifat_surat" required oninvalid="this.setCustomValidity('Mohon pilih sifat surat dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <option value="RAHASIA">RAHASIA</option>
                                    <option value="SANGAT RAHASIA">SANGAT RAHASIA</option>
                                    <option value="TERBATAS">TERBATAS</option>
                                    <option value="BIASA">BIASA</option>
                                    <option value="TERBUKA">TERBUKA</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tingkat_urgen"><?php echo e(__('Tingkat Urgensi')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="tingkat_urgen" class="form-control form-control-sm <?php $__errorArgs = ['tingkat_urgen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="width: 100%;" name="tingkat_urgen" required oninvalid="this.setCustomValidity('Mohon pilih tingkat urgensi dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <option value="BIASA">BIASA</option>
                                    <option value="SEGERA">SEGERA</option>
                                    <option value="SANGAT SEGERA">SANGAT SEGERA</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="no_surat"><?php echo e(__('Nomor Surat')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <input id="no_surat" type="text" class="form-control <?php $__errorArgs = ['no_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukan Nomor Surat ..." name="no_surat" value="<?php echo e(old('no_surat')); ?>" required autocomplete="no_surat" autofocus oninvalid="this.setCustomValidity('Mohon isi Nomor Surat terlebih dahulu!')" oninput="setCustomValidity('')">
                            </div>

                            <div class="form-group">
                                <label for="username"><?php echo e(__('Tanggal Surat')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control form-control-sm datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                                <?php $__errorArgs = ['nama_pengirim'];
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

                            
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group">
                                <label><?php echo e(__('Hal')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <textarea name="perihal" rows="3" class="form-control" id="perihal" placeholder="Masukkan hal..."></textarea>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('Isi Ringkas')); ?>

                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <textarea name="isi" rows="8" class="form-control" id="isi" placeholder="Masukkan isi ringkas..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File Surat
                                    <small style="color:red"><b>*</b></small>
                                </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php $__errorArgs = ['file_surat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="customFile" name="file_surat" required>
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <small style="color:red">
                                        Format yang didukung: .PDF
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <h3 class="card-title">TUJUAN</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Utama
                                    <small style="color:red"><b>*</b></small>
                                </label>

                                <select id="tujuans" class="form-control form-control-sm <?php $__errorArgs = ['tujuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="width: 100%;" name="id_tujuan" required oninvalid="this.setCustomValidity('Mohon pilih tujuan dahulu!')" oninput="setCustomValidity('')">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $tujuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama); ?> - <?php echo e($item->nama_jabatan); ?> - <?php echo e($item->nama_unitkerja); ?> - <?php echo e($item->nama_opd); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Simpan</button>
                </div>
              </form>
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
<!-- Select2 -->
<script src="<?php echo e(asset('assets/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script>
$(function () {
    $('#sifat_surat').select2({
        placeholder: "Pilih Sifat Surat",
        theme: 'bootstrap4'
    });

    $('#jenis_surat').select2({
        placeholder: "Pilih Jenis Surat",
        theme: 'bootstrap4'
    });

    $('#tingkat_urgen').select2({
        placeholder: "Pilih Tingkat Urgensi",
        theme: 'bootstrap4'
    });

    $('#tujuan').select2({
            placeholder: "Pilih Tujuan",
            theme: 'bootstrap4'
        });
    
    $('#tembusan').select2({
        placeholder: "Pilih Tembusan",
        theme: 'bootstrap4'
    });

    bsCustomFileInput.init();

    //Date picker
    // $('#reservationdate').datetimepicker({
    //     format: 'L'
    // })
})

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
</script>
<!-- bs-custom-file-input -->
<script src="<?php echo e(asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

<!-- date-range-picker -->
<script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>

<script type="text/javascript">
    $('#customFile').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
</script>

<script>
$(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ApeacEHpZ\Documents\Project\Sipaskal2\sisurti\resources\views/adminsurat/suratmasuk/create.blade.php ENDPATH**/ ?>