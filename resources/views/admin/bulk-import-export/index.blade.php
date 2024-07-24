@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{ Breadcrumbs::render('importexportModule') }}

            </div>
        </div>
    </div>
</div>
<!-- Start Content-->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <div class="card-block">
                        <!-- [ Data table ] start -->
                        <div class="table-responsive">
                            <table class="display table nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ __('admin.table_name') }}</th>
                                        <th>{{ __('admin.btn_import') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ __('admin.bank_group_questions') }}</td>
                                        <td>
                                            <form class="needs-validation" novalidate action="{{ route('admin.bulk.import', ['table' => 'bank_questions']) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <input type="file" name="import" class="form-control" required accept=".xlsx">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-success">{{ __('admin.btn_import') }}</button>
                                                        <a href="{{asset('public/uploads/exports/testimportquestions.xslx')}}" style="padding:10px 5px 10px 5px;" target="_blank" class="btn btn-success primary-bg" download="{{asset('public/uploads/exports/testimportquestions.xslx')}}"> 
                                                        تحميل مثال </a>
                                                        
                                                    </div>
                                                   
                                                </div>
                                            </form>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- [ Data table ] end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- End Content-->

@endsection