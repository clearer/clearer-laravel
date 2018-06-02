@extends('layouts.app')

@section('content')

    <div class="content cards flex-center">

        <div class="card">
            <div class="card__body">
            <p style="padding: 2em;">Clearer is here to help teams fearlessly generate, explore, and choose their best ideas. It's free to try, give it a spin.</p>

            <div style="padding: 2em; display: flex; align-items: center; justify-content: space-around;">
                <a href="/login" class="button">
                    <i class="material-icons">lock_open</i>
                    Sign In
                </a>
                OR 
                <a href="/register" class="button--dark">
                    <i class="material-icons">create</i>
                    Register
                </a>
            </div>
        </div>

        </div>

    </div>

@endsection