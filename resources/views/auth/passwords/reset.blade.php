@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-6 pb-3  pt-5  px-5 mx-auto text-center  text-white mt-0 mt-sm-5 bg-color">
            @if (setting('logo'))
            <img src="{{asset('storage/logo/'.setting('logo'))}}" alt="Logo"
            style="width:150px; height:150px; border-radius:50%;">
            @else
            <div class="border rounded-circle d-inline-block">
                <p class="display-3 mt-4 mr-4"> <i class="fa fa-user"></i> </p>
            </div>
            @endif
            <div class="mt-3 mt-sm-5 mx-0 mx-sm-2">
                <form class="login-form" action="{{ route('password.update') }}" method="post" id="content_form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="text-center mb-3">
                        <h5 class="mb-0">Reset Your Password</h5>
                        <span class="d-block text-muted">Enter your credentials here</span>
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"  autocomplete="email" autofocus value="{{ $email ?? '' }}">
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" class="form-control" name="password" id="password"  autocomplete="current-password" placeholder="Password" minlength="6">
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" data-parsley-equalto="#password" minlength="6">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-outline btn-block">
                        <span class="btn-label"><i class="fa fa-repeat" aria-hidden="true"></i>
                            {{ _lang('Reset Password') }}
                        </span>
                        </button>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <div class="mt-4 mt-sm-5">
                <p class="font-weight-bold"> Powered by <a href="https://sattit.com/" class="text-light"> SATT IT </a>
            </p>
        </div>
    </div>
</div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/reset_password.js') }}"></script>
@endpush