@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="breadcrumb d-block px-4">
            <a href="/{{ $project->team->slug }}/projects" class="d-flex text-dark">
                @svg('people', 'mr-2')
                {{ $project->team->name }}
            </a>
            <a href="/project/{{ $project->id }}" class="d-flex text-dark">
                @svg('project', 'mr-2')
                {{ $project->title }}
            </a>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <div class="d-flex">
                    <h6 class="d-flex">
                        @svg('question-mark', 'mr-2')
                        Question
                    </h6>
                </div>
            <div class="col-lg-10 py-4 px-0">
                
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
