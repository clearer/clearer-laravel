@extends('layouts.app')

@section('content')
<div class="cards flex-center">
    <div class="card">
        <div class="card__body">
                <h5 class="mb-2">{{__('Terms Of Service')}}</h5>
                {!! $terms !!}
    </div>
    </div>
</div>
@endsection
