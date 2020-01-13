@extends('layouts.master', ['title' => __('Password Change'), 'modal' => 'lg'])
@section('content')
<div class="row">
    <div class="col-md-8 ml-auto mr-auto">
        <div class="card stacked-form">
            <div class="card-header ">
                <h4 class="card-title">{{ _lang('Change Your Password') }}</h4>
            </div>
            <div class="card-body ">
                {!! Form::open(['route' => 'admin.password', 'id' => 'content_form','files' => true, 'method' => 'POST']) !!}
                <div class="form-group">
                    {{ Form::label('password', _lang('New Password')) }}
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' =>_lang('New Password'),'required'=>'']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', _lang('Confirm Password')) }}
                    {{ Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' =>_lang('Confirm Password'),'required'=>'']) }}
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        
                        {{ Form::submit(_lang('Change Password'), ['class' => 'btn btn-outline btn-success btn-round btn-wd w-100 ', 'id' => 'submit']) }}
                        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('loading.gif') }}" width="30"></button>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection