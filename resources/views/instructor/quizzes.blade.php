@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<style>
  .list-unstyled {
    list-style: none;
    margin-left: 0;
    padding-left: 0;
  }
</style>
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">

      <div class="col">
        {{ Breadcrumbs::render('instructor-quizzes') }}

      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">

          <a href="{{ route($route.'.create') }}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M12 5l0 14" />
              <path d="M5 12l14 0" />
            </svg>
            {{__('admin.btn_add_new')}} </a>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row row-deck row-cards">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
          </div>

          <div class="table-responsive">
            <table id="quizzesTable" class=" table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                  <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 15l6 -6l6 6"></path>
                    </svg>
                  </th>
                  <th> {{__('admin.quizzes.name')}}</th>
                  <th>{{ __('admin.quizzes.date') }}</th>
                  <th>{{ __('admin.quizzes.total_mark') }}</th>
                  <th>{{ __('admin.quizzes.pass_mark') }}</th>
                  <th>{{ __('admin.quizzes.question_number') }}</th>
                  <th>{{ __('admin.quizzes.status') }}</th>
                  <th>{{ __('admin.quizzes.track') }}</th>
                  <th>{{ __('admin.quizzes.course') }}</th>
                  <th>{{ __('admin.quizzes.level') }}</th>
                  <th> {{__('admin.quizzes.lecture')}}</th>
                  <th>{{ __('admin.quizzes.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rows as $row)

                <tr>
                  <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                  <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->created_at}}</td>
                  <td> {{ $row->total_mark }}</td>
                  <td> {{ $row->pass_mark }}</td>
                  <td>{{$row->question_number}}</td>
                  <td>


                    <div class="form-check form-switch md-3" style="margin:10px">

                      <input data-id="{{$row->id}}" data-type='App\Models\Quiz' class="form-check-input form-control toggole-class" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" @if($row->active==1) checked="checked" @endif name="active">
                    </div>
                  </td>
                  <td>
                    {{ optional($row->track)->name}}

                  </td>
                  <td>
                    {{ optional($row->course)->name}}

                  </td>
                  <td>
                    {{ optional($row->level)->name}}

                  </td>

                  <td>
                    {{ optional($row->lecture)->title}}

                  </td>






                  <td style="width: 270px;">



                    <a href="{{ route($route.'.edit',$row->id) }}" class="btn btn-icon btn-primary btn-sm">
                      <span class="far fa-edit "></span>
                    </a>
                    @if($row->has_levels == 1)
                    <a href="{{ url('admin/quizzes/'.$row->id .'/sections') }}" class="btn btn-icon btn-primary btn-sm">
                      <i class="fa fa-level-up" aria-hidden="true"></i>
                    </a>
                    @endif

                    <a href="{{ url('admin/quizzes/'.$row->id) }}" class="btn btn-icon btn-primary btn-sm">
                    <i class="far fa-eye" aria-hidden="true"></i>
                    </a>


                    <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id }}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                    <!-- Include Delete modal -->
                    @include('admin.layouts.inc.delete')
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="card-footer d-flex align-items-center">
            {{ $rows->links()}}
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php
if (app()->getLocale() == 'ar') {
  $locale = 'Arabic';
  $dir = 'right to left';
} else {
  $locale = 'English';
  $dir = 'left to right';
}

?>
@endsection

@push('scripts')
<script>
  let locale = '<?= $locale ?>'; // assuming this is set by your PHP code
  let url = `https://cdn.datatables.net/plug-ins/1.10.24/i18n/${locale}.json`;
  let dir = '<?= $dir ?>';
  console.log(url);

  new DataTable('#quizzesTable', {
    "createdRow": function(row, data, dataIndex) {
      $('#quizzesTable').removeClass('dataTable');
    },
    language: {

      url: url
    },
    'direction': dir,
    "scrollX": true,
    "fixedHeader": {
      "headerOffset": 1
    },
    columnDefs: [{
      className: 'dt-center',
      targets: '_all',

    }],
    layout: {
      topStart: {
        buttons: [{
            extend: 'colvis',
            text: '<i class="fa fa-eye-slash text-primary" aria-hidden="true" style="font-size:large;"></i>',

            columns: ":not(':first')"
          },

          {
            extend: 'copyHtml5',
            text: '<i class="fas fa-copy text-primary" style="font-size:large;"></i>',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel text-primary" style="font-size:large;"></i>',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdfHtml5',
            text: '<i class="far fa-file-pdf fa-lg text-primary"></i>',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csvHtml5',
            title: 'CSV',
            text: '<i class="fas fa-file text-primary" style="font-size:large;"></i>',
            exportOptions: {
              columns: ':not(:last-child)',
              columns: ':visible'

            }
          },

        ]
      }
    }
  });
</script>
@endpush