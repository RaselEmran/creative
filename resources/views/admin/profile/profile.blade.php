@extends('layouts.master', ['title' => __('Profile'), 'modal' => 'lg'])
@section('content')
{!! Form::open(['route' => 'admin.profile', 'class' => 'ajax_form','files' => true, 'method' => 'POST']) !!}
<div class="row">
    <div class="col-md-8 col-sm-6">
            <div class="card ">
                <div class="card-header ">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                {{ Form::label('email', _lang('Email')) }}
                                 {{ Form::text('email', get_user()->email, ['class' => 'form-control', 'placeholder' => _lang('Email'),'readonly'=>'']) }}
                              
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                 {{ Form::label('name', _lang('Full Name')) }}
                                 {{ Form::text('name', get_user()->name, ['class' => 'form-control', 'placeholder' => _lang('Full Name')]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                           <div class="form-group">
                                 {{ Form::label('designation', _lang('Designation')) }}
                                 {{ Form::text('designation', get_user()->designation, ['class' => 'form-control', 'placeholder' => _lang('Designation'),]) }}
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                {{ Form::label('mobile', _lang('Mobile')) }}
                                 {{ Form::text('mobile', get_user()->mobile, ['class' => 'form-control', 'placeholder' => _lang('Mobile')]) }}                            
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                               {{ Form::label('about', _lang('About Me')) }}
                               {{ Form::textarea('about', get_user()->about, ['class' => 'form-control','id'=>'editor1', 'rows'=>3]) }}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-wd btn-success btn-outline pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                </div>
            </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-header no-padding">
                <div class="card-image">
                    <img src="{{ asset('backend/assets/img/full-screen-image-3.jpg') }}" alt="...">
                </div>
            </div>
            <div class="card-body ">
                <div class="author">
                    <a href="#">
                       <input type="file" name="image" id="image" class="dropify" data-default-file="{{get_user()->image?asset('storage/user/'.get_user()->image):''}}" />
                        <h5 class="card-title">{{ get_user()->name }}</h5>
                    </a>
                    <p class="card-description">
                        Admin
                    </p>
                </div>
                <p class="card-description text-center">
                   {!! get_user()->about !!}
                </p>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="button-container text-center">
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                    <i class="fa fa-facebook-square"></i>
                    </button>
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                    <i class="fa fa-twitter"></i>
                    </button>
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                    <i class="fa fa-google-plus-square"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
{!!Form::close()!!}
@endsection