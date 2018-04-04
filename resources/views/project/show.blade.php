@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">

        <div class="list-group">
            <a href="/{{ $project->team->slug }}/projects" class="list-group-item text-dark">
                @svg('people', 'mr-2')
                {{ $project->team->name }}
            </a>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <div class="d-flex">
                    <h6 class="d-flex">
                        @svg('project', 'mr-2')
                        Project
                    </h6>
                    <div class="d-flex ml-auto">
                        <img src="{{ $project->owner->photo_url }}" class="avatar rounded-circle mr-2" />
                        {{ $project->owner->name }}
                        @if ($project->owner_id == Auth::id())
                            <a href="/project/{{ $project->id }}/edit">
                                @svg('pencil', 'ml-4 mr-2')
                                Edit
                            </a>
                        @endif
                    </div>
                </div>
            <div class="col-lg-10 py-4 px-0">
                <div class="card-title"><h3>{{ $project->title }}</h3></div>
                <div class="card-subtitle text-muted my-4">{{ $project->context }}</div>
            </div>
            </div>
            <div class="card-body bg-dark">
            
                @isset($project->questions)
            
            
                    @if($project->questions->isEmpty())
                    
                        <p class="text-white">No questions! Add one!</p>
                    
                    @else
                        <h6 class="d-flex text-white fill-white mb-4">
                            @svg('question-mark', 'mr-2')
                            Questions
                        </h6>
                        <div class="list-group">
                            @foreach($project->questions as $question) 
                                <a class="list-group-item list-group-item-action bg-light d-flex flex-column flex-lg-row" href="/question/{{ $question->id }}">
                                    <div class="col-12 col-lg-9 p-0">{{ $question->title }}</div>
                                    <div class="col-12 col-lg-3 p-0 d-flex justify-content-lg-end mt-3 mt-lg-0">
                                        @svg('clock', 'mr-2') {{ $question->time_due->diffForHumans() }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                    <a class="btn btn-primary mt-3" href="/project/{{ $project->id }}/question/create">Add a Question</a>
                @endisset

            </div>
        </div>
    </div>
</div>
@endsection
