@extends('admin.layouts.master')
@section('title', $title)
@section('content')


<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        {{ Breadcrumbs::render('visitor-messages') }}

      </div>

      <!-- Page title actions -->
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
          <div class="card-body border-bottom py-3">

          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                  <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 15l6 -6l6 6"></path>
                    </svg>
                  </th>
                  <th> {{__('admin.tickets.name')}}</th>
                  <th> {{__('admin.tickets.phone')}}</th>
                  <th>{{ __('admin.tickets.email') }}</th>
                  <th>{{ __('admin.tickets.job') }}</th>
                  <th>{{ __('admin.tickets.title') }}</th>
                  <th>{{ __('admin.tickets.subject') }}</th>
                  <th>{{ __('admin.tickets.send_date') }}</th>
                  <th>{{ __('admin.tickets.status') }}</th>

                  <th>{{ __('admin.tracks.actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rows as $row)

                <tr>
                  <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                  <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->phone}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->job}}</td>
                  <td>{{$row->title}}</td>
                  <td>

                    {!! Str::words($row->description, 8, ' ...') !!}

                  </td>
                  <td>{{$row->created_at}}</td>







                  <td>

                    @if($row->read ==1 )
                    <span class="badge bg-info text-info-fg">

                      @else
                      <span class="badge bg-red text-red-fg">
                        @endif
                        {{ __($row->statusLabel) }}

                      </span>
                  </td>


                  <td style="width: 270px;">
                    <a href="{{ url('admin/tickets/'.$row->id)}}" class="btn btn-icon btn-primary btn-sm">
                      <i class="far fa-eye"></i>
                    </a>
                    <button type="button" class="btn btn-icon btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#changeStatusModal-{{$row->id }}">
                      <i class="fa fa-refresh" aria-hidden="true"></i>

                    </button>
                    <!-- Include Delete modal -->
                    @include('admin.tickets.changestatus')



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

@endsection