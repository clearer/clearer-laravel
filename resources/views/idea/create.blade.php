@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="breadcrumb d-block px-4">
            <a href="/{{ $question->team->slug }}/projects" class="d-flex text-dark">
                @svg('people', 'mr-2')
                {{ $question->team->name }}
            </a>
            <a href="/project/{{ $question->project->id }}" class="d-flex text-dark">
                @svg('project', 'mr-2')
                {{ $question->project->title }}
            </a>
            <a href="/question/{{ $question->id }}/" class="d-flex text-dark">
                @svg('question-mark', 'mr-2')
                {{ $question->title }}
            </a>
        </div>
        <div class="card card-default">
            <div class="card-header">
            <form method="POST" action="/question/{{ $question->id }}/idea/">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="question">Idea:</label>
                        <input type="text" class="form-control" id="title" name="title" />
                    </div>

                    <div class="form-group">
                        <label for="description">Additional Context:</label>
                        <textarea id="description" class="form-control" name="description"></textarea>
                    </div>

                    <input type="hidden" name="team_id" value="{{ $question->team->id }}" />

                    <input class="btn btn-primary" type="submit" value="Save" />

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
