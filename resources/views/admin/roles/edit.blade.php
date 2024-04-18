@extends('admin.layouts.master')
@section('title', $title)
@section('content')

                <div class="card">
                    <div class="card-header">
                    <div class="card-block">
                        <a href="{{ route($route.'.index') }}" class="btn btn-rounded btn-primary">{{ __('btn_back') }}</a>

                        <a href="{{ route($route.'.edit', $role->id) }}" class="btn btn-rounded btn-info">{{ __('btn_refresh') }}</a>
                    </div>                    </div>
                  

                    <form class="needs-validation" novalidate action="{{ route($route.'.update', [$role->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-block">

                        <!-- Form Start -->
                        <div class="form-group">
                            <label for="name">{{ __('field_title') }} <span>*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" required>

                            @error('name')
                            <div class="invalid-feedback">
                              {{  $message  }}
                            </div>
                            @enderror
                        </div>


                        @php
                            $separation = '0';
                        @endphp
                              
                        @foreach($permission as $value) 

                        @if($separation != $value->group)
                            <hr/>
                            <h6 class="mt-4 text-primary">{{ $value->group }}</h6>
                        @endif

                        <div class="form-group d-inline" style="margin-right: 40px;">
                            <div class="checkbox d-inline">
                                <input type="checkbox" id="checkbox-{{ $value->id }}" name="permission[]" value="{{ $value->id }}"

                                @foreach($rolePermissions as $rolePermission)
                                    @if($rolePermission->permission_id == $value->id) checked @endif
                                @endforeach  
                                >

                                <label for="checkbox-{{ $value->id }}" class="cr">{{ $value->title }}</label>
                            </div>
                        </div>

                        @php
                            $separation = $value->group;
                        @endphp

                        @endforeach
                        <!-- Form End -->

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">{{ __('btn_update') }}</button>
                    </div>
                    </form>
                </div>
            

@endsection