@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('update-bankgroups',$row) }}
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

                <form class="card"  action="{{ route($route.'.update',$row) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="card-body">
                        <div class="row ">
                            <!-- Form Start -->
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="form-label" for="title"> {{__('admin.bankgroups.bank_name')}} <span>*</span></label>
                                    <input type="text" class="form-control" name="name" id="title" value="{{ old('name',$row) }}" required>

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="courses">{{ __('admin.bankgroups.course_name') }} <span>*</span></label>
                                    <select class="form-control" name="course_id" id="courses">
                                        <option value="">{{ __('select') }}</option>
                                        @if($row->course_id)
                                        <option value="{{$row->course_id}}"  selected >{{ optional($row->course)->name }}</option>
                                        @endif

                                    </select>

                                    @error('course_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="track_id">{{ __('admin.bankgroups.track_name') }} <span>*</span></label>
                                    <select class="form-control" name="track_id" id="track_id" required>
                                        <option value="">{{ __('select') }}</option>
                                        @foreach($tracks as $track)
                                        <option value="{{$track->id}}" @if($row->track_id == $track->id) selected @endif>{{ $track->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('track_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="id" value="{{ $row->id}}">

                                <div class="form-group ">
                                    <label class="form-label" for="active" class="form-label">{{ __('admin.select_status') }}</label>
                                    <div>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" value="1" type="radio" name="active"  @if($row->active == 1)  checked @endif >
                                            <span class="form-check-label"> {{ __('admin.active')}}</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" value="0" type="radio" name="active" @if($row->active == 0)  checked @endif>
                                            <span class="form-check-label"> {{ __('admin.inactive' )}}</span>
                                        </label>

                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- <div class="row row-cards" style="padding-top: 30px;">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-status-top bg-red"></div>
                                    <div class="card-header">
                                        <h3 class="card-title"> {{__('admin.bankgroups.bank_question')}} </h3>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="card-body">
                                            <table class="table" id="products_table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="product0">
                                                        <td>
                                                            <select name="products[]" class="form-control">
                                                                <option value="">-- choose product --</option>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="quantities[]" class="form-control" value="1" />
                                                        </td>
                                                    </tr>
                                                    <tr id="product1"></tr>
                                                </tbody>
                                            </table>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> -->



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
$(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>

@endpush