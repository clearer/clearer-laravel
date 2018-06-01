@extends('layouts.app')

@section('content')

    @include('spark::shared.errors')

    <div class="content cards flex-center">
        <div class="card" style="background: white">
            <h2 class="mb-8">Sign In</h2>
            <form role="form" method="POST" class="form" action="/login">
                
                {{ csrf_field() }}
            
                <div class="form__group">
                <!-- E-Mail Address -->
                    <label>{{__('E-Mail')}}</label>
                    <input type="email" name="email" value="{{ old('email') }}" autofocus>
                </div>
            
                <div class="form__group">
                <!-- Password -->
                    <label>{{__('Password')}}</label>
                    <input type="password" name="password">
                </div>
            
                <div class="form__group">
                <!-- Remember Me -->
                    <label>
                        <input type="checkbox" name="remember"> {{__('Remember Me')}}
                    </label>
                </div>
            
                <div class="form__group">
                <!-- Login Button -->
                    <button class="button" type="submit">
                        <i class="material-icons">lock_open</i>
                        {{__('Sign In')}}
                    </button>
                </div>
            
                <a href="{{ url('/password/reset') }}">{{__('Forgot Your Password?')}}</a>
            </form>
        </div>

        <div class="card">
            <h2 class="mb-8">Need an account?</h2>
            <a href="/register" class="button--dark">
                <i class="material-icons">create</i>
                Register
            </a>
        </div>
    </div>
@endsection
