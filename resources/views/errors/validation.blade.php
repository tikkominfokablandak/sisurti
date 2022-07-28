@if ($errors->count() > 0)
<div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
      @foreach ($errors->all() as $error)
          {{ $error }}<br/>
      @endforeach
</div>
@endif

<!-- Alert untuk Error Validation -->
<script>
  var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};
  
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