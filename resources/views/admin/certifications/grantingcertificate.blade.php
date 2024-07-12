@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('grantingCertifications') }}
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                    <div class="card-header">
                        <div class="card-block">
                            <a href="{{ route($route.'.index') }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-12">

                <form class="card" action="{{ route('admin.postgrantingcertificate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row card-body">
                        <!-- Form Start -->


                        <div class="form-group col-md-6">
                            <label class="form-label" for="student_id">{{__('admin.certifications.student')}} <span>*</span></label>
                            <select class="form-control select2" name="student_id" id="student_id">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $students as $student )
                                <option value="{{ $student->id }}" @if(old('student_id')==$student->id) selected @endif>{{ $student->name }}</option>
                                @endforeach
                            </select>

                            @error('student_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <div class="form-group col-md-6">
                            <label class="form-label" for="track_id">{{__('admin.certifications.track')}} <span>*</span></label>
                            <select class="form-control select2" name="track_id" id="track_id">
                                <option value="">{{ __('select') }}</option>
                                @foreach( $tracks as $track )
                                <option value="{{ $track->id }}" @if(old('track_id')==$track->id) selected @endif>{{ $track->name }}</option>
                                @endforeach
                            </select>

                            @error('track_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label class="form-label" for="courses">{{__('admin.certifications.courses')}} <span>*</span></label>
                            <select class="form-control select2" name="course_id" id="course_id" required>
                                <option value="">{{ __('select') }}</option>

                            </select>

                            @error('course_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label class="form-label" for="certificate_id">{{__('admin.certifications.certificate')}} <span>*</span></label>
                            <select class="form-control select2" name="certificate_id" id="certificate_id" required>
                               
                            </select>

                            @error('certificate_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">


                            <label for="serial_number">{{__('admin.certifications.serial_number')}}</label>
                            <input type="text" class="form-control" name="serial_number" id="serial_number">

                            @error('serial_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">


                            <label for="logo">{{__('admin.certifications.certification_file')}}</label>
                            <input type="file" class="form-control" name="file" id="logo">

                            @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <!-- Form End -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $('document').ready(function(){
        $('#course_id').on('change', function() {
			var course_id = $(this).val();
			if (course_id) {
				$.ajax({
					url: "{{ route('admin.getCertifications') }}",
					type: "GET",
					data: {
						'course_id': course_id
					},
					dataType: "json",
					success: function(data) {
						var html = '<option value="">Select Certification</option>';
						$.each(data, function(index, value) {
							html += '<option value="' + value.id + '">' + value.name + '</option>';
						});
						$('#certificate_id').html(html);
					}
				})
			}
		});
    });
</script>

@endpush