    <!-- Edit modal content -->
    <div id="changePasswordModal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="needs-validation"data-remote="true"  action="{{ route($route.'-password-change') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">   {{ __('admin.edit_password')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <input type="hidden" name="staff_id" value="{{ $row->id }}">

                    <div class="form-group">
                        <label for="password" class="form-label">{{ __('admin.users.field_password') }} <span>*</span></label>
                        <input type="password" class="form-control" name="password" id="password" value="" required autocomplete="new-password">
                        <i class="fa password-icon" aria-hidden="true"></i>
                            @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="form-label">
                        {{ __('admin.users.field_password_confirmation') }}                             <span>*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value="" required autocomplete="new-password">
                        <i class="fa password-icon" aria-hidden="true"></i>
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('admin.btn_close') }}</button>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </div>

              </form>
            </div>
        </div>
    </div>

    <script>
  $('document').ready(function(){
    $('form[data-remote]').on('ajax:error', function(e, xhr, status, error) {
    var errorMessage = xhr.responseText;
    // popup a modal with the error message
    $('#changePasswordModal-<?= $row->id ?>').modal('show').find('.modal-body').text(errorMessage);
});
  });
  
</script>