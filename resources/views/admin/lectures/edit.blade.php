@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<style>
  .hidden {
    display: none;
  }

  h1 {
    font-family: Arial;
    font-size: 20px;
    color: #666;
  }

  .data-table {
    border: solid 1px #eee;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
    width: 100%;
  }

  .data-table tbody td {
    border: solid 1px #eee;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
  }

  .data-table-highlight tbody tr:hover {
    background-color: #f8f8f8;
  }

  .data-table-horizontal tbody td {
    border-left: none;
    border-right: none;
  }

  .top-buffer {
    margin-top: 20px;
  }

  .pull-right {
    float: right;
  }

  .main {
    width: 90%;
  }
</style>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('update-lectures',$level->course,$level,$row) }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <div class="card-header">
            <div class="card-block">
              <a href="{{ route($route.'.index',$level->id) }}" class="btn btn-rounded btn-primary">{{ __('admin.btn_back') }}</a>

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


        <form class="card"  action="{{ route($route.'.update',[$level->id,$row]) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="card-body">
            <div class="row ">
              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="title"> {{ __('admin.lectures.field_title') }} <span>*</span></label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title',$row) }}" required>

                  @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <input type="hidden" name="id" value="{{$row->id}}">
                <div class="mb-3">
                  <label class="form-label" for="type">{{ __('admin.lectures.type') }} <span>*</span></label>
                  <select class="form-control" name="type" id="typeSelect" required>
                    <option value="">{{ __('select') }}</option>
                    <option value="1" @if($row->type == 1) selected @endif> {{ __('admin.lectures.viedo')}}</option>
                    <option value="2" @if($row->type == 2) selected @endif> {{ __('admin.lectures.metting')}}</option>
                    <option value="3" @if($row->type == 3) selected @endif> {{ __('admin.lectures.offline')}}</option>

                  </select>

                  @error('type')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="mb-3" id="provider_div">
                  <label class="form-label" for="provider">{{ __('admin.lectures.provider') }} <span>*</span></label>
                  <select class="form-control" name="provider" id="provideSelect" required>
                    <option value="">{{ __('select') }}</option>
                    <option value="1" @if($row->provider == 1) selected @endif> {{ __('admin.lectures.viemo')}}</option>
                    <option value="2" @if($row->provider == 2) selected @endif> {{ __('admin.lectures.Youtube')}}</option>

                    <option value="3" @if($row->provider == 3) selected @endif> {{ __('admin.lectures.external_link')}}</option>
                  </select>

                  @error('provider')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="mb-3"   id="appointment_div" style="padding-top: 18px;">
                  <label class="form-label" for="appointment"> {{ __('admin.lectures.appointment') }} <span>*</span></label>
                  <!-- <input type="text" class="form-control" name="appointment" id="appointment" value="{{ old('appointment',$row) }}"> -->
                  <input type="text" name="appointment" id="appointment" class="form-control"  value="{{ old('appointment',$row) }}" data-mask="00/00/0000 00:00:00" data-mask-visible="true" placeholder="00/00/0000 00:00:00" autocomplete="off">

                  @error('appointment')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="period"> {{ __('admin.lectures.field_period') }} <span>*</span></label>
                  <input type="text" class="form-control" name="period" id="period" value="{{ old('period',$row) }}" required>

                  @error('period')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <input type="hidden" value="{{ $level->id}}" name="level_id">
                <input type="hidden" value="{{ optional($level->course)->id}}" name="course_id">


                <div class="mb-3">
                  <label class="form-label" for="title"> {{ __('admin.lectures.opened_free') }} <span>*</span></label>
                  <div class="form-check form-switch md-3" style="margin:10px">


                    <input class="form-check-input form-control" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" name="free" @if($row->free == 1 ) checked @endif>
                  </div>
                </div>



                <div class="mb-3" id="link_div" style="padding-top: 18px;">
                  <label class="form-label" for="link"> {{ __('admin.lectures.link') }} <span>*</span></label>
                  <input type="text" class="form-control" name="link" id="link" value="{{ old('link',$row) }}" required>

                  @error('link')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>


              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.short_description') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="short_description" rows="3" placeholder="Content.."> {!!  $row->short_description !!}</textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.goals') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="goals" rows="3" placeholder="Content..">{!!  $row->goals !!}</textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.descriptions') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="description" rows="3" placeholder="Content..">{!! $row->description !!}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">{{ __('admin.lectures.conclusion') }} <span class="form-label-description"></span></label>
                <textarea class="form-control" name="conclusion" rows="3" placeholder="Content.."> {!!  $row->conclusion !!}</textarea>
              </div>

              <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                  <h3> إضافة صور </h3>
                </div>
                <div class="card-body">

                  <div class="main">
                    <table id="data" class=" table data-table data-table-horizontal data-table-highlight">

                      <tbody>
                        <tr>
                          <td><input type="text" name="imgTitle[]" placeholder="عنوان الصورة" /></td>
                          <td><input type="file" name="img[]" /></td>
                          <td><a type="button" value="Delete" onclick="deleteRow(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>
                        @if($row->photos)
                        @foreach($row->photos as $photo)
                        <tr>
                          <td><input type="text" name="imgTitle[]" value="{{$photo->title}}" /></td>
                          <td>
                            <input type="file" name="img[]" />
                          </td>
                          <td><a type="button" value="Delete" onclick="deleteRow(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>
                        @endforeach

                        @endif

                    </table>
                    <div class="pull-right">
                      <input type="button" value="إضافة" class="top-buffer" onclick="addRow('data')" />
                    </div>
                  </div>

                </div>
              </div>

              <div class="card" style="margin-top: 20px;">
                <div class="card-header">
                  <h3> إضافة الكتب والمراجع </h3>
                </div>
                <div class="card-body">
                  <div class="main">
                    <table id="data2" class=" table data-table data-table-horizontal data-table-highlight">

                      <tbody>
                        <tr>
                          <td><input type="text" name="bookTitles[]" placeholder="عنوان الكتاب" /></td>
                          <td><input type="file" name="bookFiles[]" /></td>
                          <td><input type="text" name="bookLinks[]" placeholder="رابط الكتاب" /></td>
                          <td><a type="button" value="Delete" onclick="deleteRow2(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>
                        @if($row->books)
                        @foreach($row->books as $book)
                        <tr>
                          <td><input type="text" name="bookTitles[]" value="{{ $book->title }}" /></td>
                          <td><input type="file" name="bookFiles[]" /></td>
                          <td><input type="text" name="bookLinks[]" value="{{ $book->link }}" /></td>
                          <td><a type="button" value="Delete" onclick="deleteRow2(this)">
                              <i class="fas fa-trash-alt"></i>
                            </a></td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
                    <div class="pull-right">
                      <input type="button" value="إضافة" class="top-buffer" onclick="addRow('data2')" />
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">{{ __('admin.btn_save') }}</button>
          </div>
        </form>
      </div>
    </div>
    <!-- [ Card ] end -->
  </div>
</div>
<!-- [ Main Content ] end -->


@endsection
@push('scripts')

<!-- <script>
  
  document.getElementById("typeSelect").addEventListener("change", function() {
    var selectedValue = this.value;
    var option1Div = document.getElementById("appointment_div");
    var option2Div = document.getElementById("link_div");
    var option3Div = document.getElementById("provider_div");


    option1Div.classList.add("hidden");
    option2Div.classList.add("hidden");
    option3Div.classList.add("hidden");

    switch (selectedValue) {
      case "1":
        option1Div.classList.add("hidden");
        option2Div.classList.remove("hidden");
        option3Div.classList.remove("hidden");
        break;
      case "2":
        option1Div.classList.remove("hidden");
        option2Div.classList.remove("hidden");
        option3Div.classList.add("hidden");
        break;
      case "3":
        option1Div.classList.add("hidden");
        option2Div.classList.add("hidden");
        option3Div.classList.add("hidden");

    }
  });
</script> -->
<script>
  function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var colCount = table.rows[0].cells.length;

    for (var i = 0; i < colCount; i++) {
      var newRow = row.insertCell(i);

      newRow.innerHTML = table.rows[0].cells[i].innerHTML;
      newRow.childNodes[0].value = "";
    }
  }

  function deleteRow(row) {
    var table = document.getElementById("data");
    var rowCount = table.rows.length;
    if (rowCount > 1) {
      var rowIndex = row.parentNode.parentNode.rowIndex;
      document.getElementById("data").deleteRow(rowIndex);
    } else {
      alert("Please specify at least one value.");
    }
  }

  function deleteRow2(row) {
    var table = document.getElementById("data2");
    var rowCount = table.rows.length;
    if (rowCount > 1) {
      var rowIndex = row.parentNode.parentNode.rowIndex;
      document.getElementById("data2").deleteRow(rowIndex);
    } else {
      alert("Please specify at least one value.");
    }
  }
</script>
@endpush