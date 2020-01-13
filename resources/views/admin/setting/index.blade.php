@extends('layouts.master', ['title' => __('Setting'), 'modal' => 'lg'])
@section('content')
<div class="row">
    <div class="nav-container" style=" border: 1px dotted">
        <ul class="nav nav-icons nav-justified" role="tablist">
            <li class="nav-item show active">
                <a class="nav-link" id="description-tab" href="#description-logo" role="tab" data-toggle="tab">
                    <i class="nc-icon nc-bank"></i>
                    <br> {{ _lang('Basic Setting') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="location-tab" href="#map-logo" role="tab" data-toggle="tab">
                    <i class="nc-icon nc-camera-20"></i>
                    <br> {{ _lang('Logo & Favicon') }}
                </a>
            </li>

        </ul>
    </div>
    {!! Form::open(['route' => 'admin.setting', 'class' => 'ajax_form','files' => true, 'method' => 'POST']) !!}
    <div class="tab-content">
        <div class="tab-pane fade show active" id="description-logo" aria-labelledby="info-tab">
            <div class="card">
                <div class="card-body">
                     <div class="row">
                <div class="col-md-6">
                  {{ Form::label('company_name', _lang('Company Name') , ['class' => 'col-form-label ']) }}
                  {{ Form::text('company_name', setting('company_name'), ['class' => 'form-control', 'placeholder' => _lang('Company Name')]) }}
                </div>
                <div class="col-md-6">
                  {{ Form::label('site_title', _lang('Title') , ['class' => 'col-form-label ']) }}
                  {{ Form::text('site_title', setting('site_title'), ['class' => 'form-control', 'placeholder' => _lang('Title')]) }}
                </div>
                <div class="col-md-6">
                  {{ Form::label('email', _lang('Email') , ['class' => 'col-form-label ']) }}
                  {{ Form::text('email', setting('email'), ['class' => 'form-control', 'placeholder' => _lang('Email')]) }}
                </div>
                <div class="col-md-6">
                  {{ Form::label(_lang('phone'), _lang('Phone') , ['class' => 'col-form-label ']) }}
                  {{ Form::text('phone',setting('phone'), ['class' => 'form-control', 'placeholder' => _lang('Phone')]) }}
                </div>
                <div class="col-md-6">
                  {{ Form::label('alt_phone', _lang('Alternative Phone') , ['class' => 'col-form-label ']) }}
                  {{ Form::text('alt_phone', setting('alt_phone'), ['class' => 'form-control', 'placeholder' => _lang('Alternative Phone')]) }}
                </div>
                <div class="col-md-6">
                  {{ Form::label('start_date', _lang('Starting Date') , ['class' => 'col-form-label ']) }}
                  {{ Form::text('start_date', setting('start_date'), ['class' => 'form-control datepicker', 'placeholder' => _lang('Starting Date')]) }}
                </div>
                <div class="col-md-6">
                  {{ Form::label('timezone', _lang('timezone') , ['class' => 'col-form-label ']) }}
                  <select name="timezone" class="form-control select">
                    @foreach (tz_list() as $key=> $time)
                    <option  value="{{$time['zone']}}">{{ $time['diff_from_GMT'] . ' - ' . $time['zone']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  {{ Form::label('language', _lang('language') , ['class' => 'col-form-label ']) }}
                  <select name="language" class="form-control select">
                    {!! load_language( setting('language') ) !!}
                  </select>
                </div>
                <div class="col-md-6">
                  {{ Form::label('land_mark', _lang('Land Mark') , ['class' => 'col-form-label']) }}
                  {{ Form::text('land_mark', setting('land_mark'), ['class' => 'form-control', 'placeholder' => _lang('Land Mark')]) }}
                </div>
                <div class="col-md-6">
                  {{ Form::label('account', _lang('Account Module') , ['class' => 'col-form-label ']) }}
                  <select name="account" class="form-control select" style="width: 100%">
                    <option {{ setting('account')=='Show'?'selected':'' }} value="Show">Show</option>
                    <option {{ setting('account')=='Hide'?'selected':'' }} value="Hide">Hide</option>
                  </select>
                </div>
                   <div class="col-md-6">
                  {{ Form::label('employee', _lang('Employee Module') , ['class' => 'col-form-label ']) }}
                  <select name="employee" class="form-control select" style="width: 100%">
                    <option {{ setting('employee')=='Show'?'selected':'' }} value="Show">Show</option>
                    <option {{ setting('employee')=='Hide'?'selected':'' }} value="Hide">Hide</option>
                  </select>
                </div>
                   <div class="col-md-6">
                  {{ Form::label('permission', _lang('Permission Module') , ['class' => 'col-form-label ']) }}
                  <select name="permission" class="form-control select" style="width: 100%">
                    <option {{ setting('permission')=='Show'?'selected':'' }} value="Show">Show</option>
                    <option {{ setting('permission')=='Hide'?'selected':'' }} value="Hide">Hide</option>
                  </select>
                </div>
                <div class="col-md-12">
                  {{ Form::label('address', _lang('Address') , ['class' => 'col-form-label']) }}
                  {{ Form::textarea('address', setting('address'), ['class' => 'form-control','id'=>'editor1', 'rows'=>3]) }}
                </div>
              </div>
            </div>
            </div>
        </div>
        <div class="tab-pane fade" id="map-logo" aria-labelledby="info-tab">
            <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                  {{ Form::label('logo', _lang('logo') , ['class' => 'col-form-label']) }}
                  <input type="file" name="logo" id="logo" class="dropify" data-default-file="{{setting('logo')?asset('storage/logo/'.setting('logo')):''}}" />
                  @if(setting('logo'))
                  <input type="hidden" name="oldLogo" value="{{setting('logo')}}">
                  @endif
                </div>
                <div class="col-md-12">
                    <h3 style="text-align:center;">Settting Your Logo And Favicon Here</h3>
                </div>
                <div class="col-md-12">
                  {{ Form::label('favicon', _lang('favicon') , ['class' => 'col-form-label']) }}
                  <input type="file" name="favicon" id="favicon" class="dropify" data-default-file="{{setting('favicon')?asset('storage/logo/'.setting('favicon')):''}}" />
                  @if(setting('favicon'))
                  <input type="hidden" name="oldfavicon" value="{{setting('favicon')}}">
                  @endif
                </div>
              </div>
                </div>
            </div>
        </div>
    </div>
  <div class="row">
  <div class="col-md-6 mx-auto text-center">
    
    {{ Form::submit(_lang('Create'), ['class' => 'btn btn-outline btn-success btn-round btn-wd w-100 ', 'id' => 'submit']) }}
    <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('loading.gif') }}" width="80"></button>
  </div>
</div>
{!!Form::close()!!}
</div>
@endsection

@push('js')
@endpush