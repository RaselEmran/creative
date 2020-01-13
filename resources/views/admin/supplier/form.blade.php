@php
$route = 'admin.supplier.';
@endphp
@if(isset($model))
{!! Form::model($model, ['route' => [$route.'update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT', 'files' => true]) !!}
@else
{!! Form::open(['route' => $route.'store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
@endif
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      {{ Form::label('name', _lang('Name') , ['class' => 'col-form-label required']) }}
      {{ Form::text('name', null, ['class' => 'form-control', 'id'=>'name', 'placeholder' => _lang('Name'),'required'=>'']) }}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      {{ Form::label('email', _lang('Email') , ['class' => 'col-form-label']) }}
      {{ Form::text('email', null, ['class' => 'form-control', 'id'=>'email', 'placeholder' => _lang('Email')]) }}
    </div>
    
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {{ Form::label('phone', _lang('Phone') , ['class' => 'col-form-label']) }}
      {{ Form::text('phone', null, ['class' => 'form-control', 'id'=>'phone', 'placeholder' => _lang('Phone'),'required'=>'']) }}
    </div>
    
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {{ Form::label('address', _lang('Address') , ['class' => 'col-form-label']) }}
      {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' =>  _lang('Address'), 'rows' => '5']) }}
      <span id="address_error"></span>
    </div>
    <input type="hidden" name="type" value="Customer">
    
  </div>
</div>
<div class="row">
  <div class="col-md-6 mx-auto text-center">
    
    {{ Form::submit(isset($model) ? _lang('Update'):_lang('Create'), ['class' => 'btn btn-outline btn-success btn-round btn-wd w-100 ', 'id' => 'submit']) }}
    <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('loading.gif') }}" width="15"></button>
  </div>
</div>
{!!Form::close()!!}