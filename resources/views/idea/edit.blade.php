@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="card card-default">
            <div class="card-header">
            <form method="POST" action="/idea/{{ $idea->id }}">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label for="question">Idea:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $idea->title }}" />
                    </div>

                    <div class="form-group">
                        <label for="description">Additional Context:</label>
                        <textarea id="description" class="form-control" name="description">{{ $idea->description }}</textarea>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save" />

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
