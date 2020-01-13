@extends('layouts.master', ['title' => __('User'), 'modal' => 'lg'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="badge-header">
            <div class="row">
                <div class="col-md-6">
                    <button class="title btn btn-outline btn-wd mt-2">
                    <i class="fa fa-check"></i>
                    
                    {{_lang('User Update')}}
                    </button>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <a href="{{ route('admin.user.user-manage.index') }}" class=" btn-icon btn btn-outline btn-round btn-wd mt-2">
                        <span class="btn-label">
                            <i class="glyphicon fa fa-th-list"></i>
                        </span>{{_lang('User List')}}
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card stacked-form">
            <div class="card-header ">
                <h4 class="card-title">{{ _lang('Create New User') }}</h4>
            </div>
            <div class="card-body ">
                {!! Form::open(['route' => ['admin.user.user-manage.update', $user->id], 'id'=>'content_form','files' => true, 'method' => 'PUT']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('name', _lang('Full Name')) }}
                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => _lang('Full Name'),'required'=>'']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('email', _lang('Email')) }}
                            {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => _lang('Email'),'required'=>'']) }}
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('role', _lang('Role')) }}
                            {!! Form::select('role', $roles, $user->roles->first()->id, ['class' => 'form-control select', 'data-placeholder' => 'Select A Role','required'=>'', 'data-parsley-errors-container' => '#parsley_division_error_area']); !!}
                            <span id="parsley_division_error_area"></span>
                            
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="switch">
                        <input type="checkbox" name="status" value="{{ $user->status }}" {{ $user->status == 'activated' ? 'checked' : '' }} >
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        
                        {{ Form::submit(_lang('Update User'), ['class' => 'btn btn-outline btn-success btn-round btn-wd w-100 ', 'id' => 'submit']) }}
                        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('loading.gif') }}" width="50"></button>
                    </div>
                </div>
                {!!Form::close()!!}
                
            </div>
        </div>
    </div>
</div>
@endsection