@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">

      <div class="col">
        @include('admin.layouts.inc.breadcrumb')

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
          <div class="card-body">

            <div class="table-responsive">
              <table id="instructorPaymentReuest" class="display table nowrap table-striped table-hover" style="width:100%">
                <thead>
                  <tr>
                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                    <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 15l6 -6l6 6"></path>
                      </svg>
                    </th>
                    <th> {{__('admin.number')}}</th>
                    <th> {{__('admin.date')}}</th>
                    <th> {{__('admin.intructor_name')}}</th>
                    <th>{{ __('admin.intructor_current_balance') }}</th>
                    <th>{{ __('admin.amount') }}</th>
                    <th>{{ __('admin.status') }}</th>

                    <th>{{ __('admin.notes') }}</th>


                    <th>{{ __('admin.field_action') }}</th>



                  </tr>
                </thead>
                <tbody>
                  @foreach($rows as $row)

                  <tr>
                    <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                    <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                    <td>{{$row->id}}</td>
                    <td>{{$row->date}}</td>
                    <td>{{ optional($row->instructor)->name  }} </td>

                    <td>{{ optional($row->instructor)->current_balance}} {{ $setting->currency }} </td>
                    <td>{{$row->value}} {{ $setting->currency }}</td>
                    <td>{{$row->statusLabel }} </td>
                    <td> {{ $row->notes }}</td>
                    <td>
                      @if($row->status != 1)
                    <a href="#"  title="{{__('admin.edit')}}"  data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            @endif
                    </td>




                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
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

  new DataTable('#instructorPaymentReuest', {
    "createdRow": function(row, data, dataIndex) {
      $('#instructorPaymentReuest').removeClass('dataTable');
    },
    language: {

      url: url
    },
    'direction': dir,
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