@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<div class="page-header ">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('all-student-payments') }}

      </div>
     
      <!-- Page title actions -->
    </div>
  </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">



            <div class="col-sm-12">
                <div class="card">
                <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="studentPaymentTable" class="display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('admin.studentPayments.student') }}</th>
                                        <th>{{ __('admin.studentPayments.field_course') }}</th>
                                        <th>{{ __('admin.studentPayments.field_paid') }}</th>
                                        <th>{{ __('admin.studentPayments.field_date') }}</th>
                                        <th>{{ __('admin.studentPayments.field_paymenttype') }}</th>
                                        <th>{{ __('admin.studentPayments.field_payment_attachmend') }}</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($row->student)->name }}</td>
                                        <td>{{ optional($row->course)->name }}</td>
                                        <td>{{ $row->paid }} {{ $setting->currency }}</td>
                                        <td>{{ $row->created_at->format('l, F j, Y')  }}</td>

                                        <td>{{ optional($row->paymentType)->name }}</td>
                                        <td>
                                            @if($row->bill)
                                            <a href="{{ asset($row->billFullPath)}}" target="_blank" class="btn btn-icon btn-primary btn-sm">
                                                <img src="{{asset($row->billFullPath)}}" style="width:40px"> </a>
                                            @else
                                            {{ __('admin.no_file') }}
                                            @endif
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
if(app()->getLocale() == 'ar'){
$locale = 'Arabic';
$dir = 'right to left';
}
else
{ 
$locale = 'English';
$dir = 'left to right';
}

?>
@endsection

@push('scripts')
<script>

let locale = '<?= $locale?>'; // assuming this is set by your PHP code
let url = `https://cdn.datatables.net/plug-ins/1.10.24/i18n/${locale}.json`;
let dir = '<?= $dir?>'; 
console.log(url);

new DataTable('#studentPaymentTable', {
  language: {

    url: url
  },
  'direction': dir,
  columnDefs: [
                      {className: 'dt-center', targets: '_all' ,

                      }
                        ],
    layout: {
        topStart: {
            buttons: [
              {
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