@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="breadcrumb d-block px-4">
            <a href="/{{ $idea->question->project->team->slug }}/projects" class="d-flex text-dark">
                @svg('people', 'mr-2')
                {{ $idea->question->project->team->name }}
            </a>
            <a href="/project/{{ $idea->question->project->id }}" class="d-flex text-dark">
                @svg('project', 'mr-2')
                {{ $idea->question->project->title }}
            </a>
            <a href="/question/{{ $idea->question->id }}/" class="d-flex text-dark">
                @svg('question-mark', 'mr-2')
                {{ $idea->question->title }}
            </a>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <div class="d-flex">
                    <h6 class="d-flex">
                        @svg('lightbulb', 'mr-2')
                        Idea
                    </h6>
                    <div class="d-flex ml-auto">
                        @svg('heart', 'ml-4')
                        <span class="ml-2">{{ sizeOf($idea->votes) }}</span>
                    </div>
                </div>
            <div class="col-lg-10 py-4 px-0">
                <div class="card-title"><h3>{{ $idea->title }}</h3></div>
                <div class="card-subtitle text-muted my-4">{{ $idea->description }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
