@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="card card-default">
            <div class="card-header">
                @include('idea.upsert');
            </div>
        </div>
    </div>
</div>
@endsection
