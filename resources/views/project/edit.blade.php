@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">

        <div class="card card-default">
            <div class="card-body">

            {{ $project }}
            
            <form method="POST" action="/project/{{ $project->id }}">

                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <input type="hidden" name="project_id" value="{{ $project->id }}" />

                <div class="form-group">
                    <label for="title">Project Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}" />
                </div>

                <div class="form-group">
                    <label for="description">Additional Context:</label>
                    <textarea id="description" class="form-control" name="description">{{ $project->description }}</textarea>
                </div>

                <input class="btn btn-primary" type="submit" value="Save" />

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
