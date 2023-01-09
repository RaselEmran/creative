
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
                <p class="display-2 mt-4 mr-5"> <i class="fa fa-user"></i> </p>
            </div>
            @endif
            <div class="mt-3 mt-sm-5 mx-0 mx-sm-2">
                <form action="{{ route('login') }}" method="post" id="login">
                    <div class="form-group row no-gutters">
                        <label for="email" class="col-2 col-form-label"> <i class="fa fa-address-card" aria-hidden="true"></i> </label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" autofocus>
                        </div>
                    </div>
                    <div class="form-group row no-gutters">
                        <label for="password" class="col-2 col-form-label"> <i class="fa fa-unlock-alt" aria-hidden="true"></i> </label>
                        <div class="col-10">
                            <input type="password" class="form-control" name="password" id="password"  autocomplete="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"
                            id="submit">{{ _lang('Sign in') }}</button>
                    </div>
                     <div class="text-center">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                </form>
            </div>
            <br>
            <br>
         {{--    <div class="mt-3 mt-sm-5">
                <p class="font-weight-bold"> Powered by <a href="https://sattit.com/" class="text-light"> SATT IT </a>
                </p>
            </div> --}}
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/login.js') }}"></script>
@endpush

