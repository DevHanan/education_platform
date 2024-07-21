@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>
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
                                            <input type="file" name="import" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                            <button type="submit" class="btn btn-success">{{ __('admin.btn_import') }}</button>
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