@extends('layouts.app')

@section('content')

    <div style="max-width: 400px; margin: 0 auto;">

    @component('components.widget')

        @slot('content')
        <p style="padding: 2em;">
        Clearer is here to help teams fearlessly generate, explore, and choose their best ideas. It's free to try, give it a spin.
        </p>
        @endslot

    @endcomponent

    <div style="padding: 2em; display: flex; justify-content: space-around;">
        <a href="/login" class="button">Login</a>
        <a href="/register" class="button">Register</a>
    </div>

    </div>

@endsection