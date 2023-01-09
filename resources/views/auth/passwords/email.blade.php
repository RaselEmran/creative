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
                <form method="POST" action="{{ route('password.email') }}" id="content_form">
                    <div class="text-center mb-2">
                        <h5 class="mb-0">Password recovery</h5>
                        <span class="d-block text-muted">We'll send you instructions in email</span>
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-right">
                        <input type="email" class="form-control" placeholder="Your email"  autofocus name="email" id="email">
                    </div>
                    <button type="submit" class="btn btn-warning btn-outline btn-block" id="submit"><span class="btn-label"><i class="fa fa-repeat" aria-hidden="true"></i></span> Reset password</button>
                    <div class="text-center">
                        @if (Route::has('login'))
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ _lang('Back To Login') }}
                        </a>
                        @endif
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
<script src="{{ asset('js/forgot_password.js') }}"></script>
@endpush