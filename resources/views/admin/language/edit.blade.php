@extends('layouts.master', ['title' => __('Language'), 'modal' => false])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="badge-header">
            <div class="row">
                <div class="col-md-6">
                    <button class="title btn btn-outline btn-wd mt-2">
                    <i class="fa fa-check"></i>
                    
                    {{ $id }}
                    </button>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <a href="{{ route('admin.language') }}" class=" btn-icon btn btn-outline btn-round btn-wd mt-2">
                        <span class="btn-label">
                            <i class="glyphicon fa fa-th-list"></i>
                        </span>{{_lang('Language List')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="card stacked-form">
            <div class="card-body ">
                {!! Form::open(['route' => ['admin.language.update',$id], 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}
                @method('patch')
                <div class="row">
                    @foreach($language as $key=>$lang)
                    <div class="col-md-6">
                        {{ Form::label('language_name', ucwords($key) , ['class' => 'col-form-label required']) }}
                        <input type="text" class="form-control" name="language[{{ str_replace(' ','_',$key) }}]" value="{{ $lang }}" required>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        
                        {{ Form::submit(_lang('Translate Language'), ['class' => 'btn btn-outline btn-success btn-round btn-wd w-100 ', 'id' => 'submit']) }}
                        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('loading.gif') }}" width="50"></button>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection