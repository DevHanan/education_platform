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
      {{ Breadcrumbs::render('instructor-profits') }}

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
            <table class=" export-table table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                  <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M6 15l6 -6l6 6"></path>
                    </svg>
                  </th>
                  <th> {{__('admin.courses.name')}}</th>
                  <th>{{ __('admin.courses.track') }}</th>

                  <th>{{ __('admin.courses.price_with_discount') }}</th>
                  <th>{{ __('admin.dashboard.subscriptions_count') }}</th>
                  <th>{{ __('admin.dashboard.subscriptions_total') }}</th>
                  <th>{{ __('admin.course_price') }}</th>
                  <th>{{ __('admin.course_prectange') }}</th>
                  <th>{{ __('admin.total_profit') }}</th>


                </tr>
              </thead>
              <tbody>
                @foreach($rows as $row)

                <tr>
                  <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                  <td><span class="text-secondary">{{$loop->iteration}}</span></td>
                  <td>{{$row->name}}</td>
                  <td>
                    @if($row->tracks)
                    <ul class="list-unstyled">
                      @foreach($row->tracks as $item)
                      <li> {{ $item->name  }}</li>
                      @endforeach
                    </ul>
                    @endif

                  </td>


                  <td>{{$row->price_with_discount}} {{ $setting->currency }}</td>

                  <td> {{ $row->SubscriptionCount }}</td>
                  <td> {{ $row->SubscriptionCount  *  $row->price_with_discount }} {{ $setting->currency }}</td>
                  <td> {{ $row->instructors[0]->course_price}} {{ $setting->currency }}</td>
                  <td> {{
                    $row->instructors->first()->course_prectange }} %
                  </td>
                  <td>
                   
                    <?php echo  $row->instructors->first()->course_price
                      +
                      ($row->instructors->first()->course_prectange *( ($row->price_with_discount / 100) * $row->SubscriptionCount ))
                    ?>

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