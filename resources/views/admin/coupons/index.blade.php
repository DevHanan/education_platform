@extends('admin.layouts.master')
@section('title', $title)
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('coupons') }}

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
                        {{ __('admin.btn_add_new') }}
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">



            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table id="copounTable" class=" display table nowrap table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>{{ __('admin.coupons.code') }}</th>
                                        <th>{{ __('admin.coupons.course') }}</th>
                                        <th>{{ __('admin.coupons.track') }}</th>
                                        <th>{{ __('admin.coupons.times_used') }}</th>
                                        <th>{{ __('admin.coupons.discount') }}</th>
                                        <th>{{ __('admin.coupons.create_date') }}</th>
                                        <th>{{ __('admin.coupons.start_date') }}</th>
                                        <th>{{ __('admin.coupons.end_date') }}</th>
                                        <th>{{ __('admin.coupons.status') }}</th>
                                        <th>{{ __('admin.coupons.action') }}</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $rows as $key => $row )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $row->code }}</td>
                                        <td>{{ optional($row->course)->name }}</td>
                                        <td> {{ optional($row->track)->name }}
                                        </td>
                                        <td> {{ $row->subscriptions()->count() }}</td>
                                        <td>{{ $row->discount }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>{{ $row->start_date }}</td>

                                        <td>{{ $row->end_date }}</td>
                                        <td>


                                            <div class="form-check form-switch md-3" style="margin:10px">

                                                <input data-id="{{$row->id}}" data-type='App\Models\Coupon' class="form-check-input form-control toggole-class" type="checkbox" style="float: right;" role="switch" id="flexSwitchCheckDefault" @if($row->active==1) checked="checked" @endif name="active">
                                            </div>
                                            @if($row->active == 1)
                                            <span class="badge bg-green text-green-fg">{{ __('admin.active')}}</span>
                                            @else
                                            <span class="badge bg-red text-red-fg">{{ __('admin.inactive')}}</span>
                                            @endif
                                        </td>

                                        <td>





                                            <a href="{{ route($route.'.edit', $row->id) }}"  title="{{__('admin.edit')}}"  data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <button type="button" class="btn btn-icon btn-danger btn-sm"  title="{{__('admin.delete')}}"   data-bs-placement="bottom" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $row->id }}">
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

new DataTable('#copounTable', {
    "createdRow": function(row, data, dataIndex) {
      $('#copounTable').removeClass('dataTable');
    },
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