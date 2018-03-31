@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="breadcrumb d-block px-4">
            <a href="/{{ $question->project->team->slug }}/projects" class="d-flex text-dark">
                @svg('people', 'mr-2')
                {{ $question->project->team->name }}
            </a>
            <a href="/project/{{ $question->project->id }}" class="d-flex text-dark">
                @svg('project', 'mr-2')
                {{ $question->project->title }}
            </a>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <div class="d-flex">
                    <h6 class="d-flex">
                        @svg('question-mark', 'mr-2')
                        Question
                    </h6>
                    <div class="d-flex ml-auto">
                        <img src="{{ $question->owner->photo_url }}" class="avatar rounded-circle mr-2" />
                        {{ $question->owner->name }}
                        @svg('clock', 'ml-4')
                        <span class="ml-2">{{ date('M d', strtotime($question->time_due)) }}</span>
                    </div>
                </div>
            <div class="col-lg-10 py-4 px-0">
                <div class="card-title"><h3>{{ $question->title }}</h3></div>
                <div class="card-subtitle text-muted my-4">{{ $question->description }}</div>
            </div>
            </div>
            <div class="card-body bg-dark">
            @isset($question->ideas)
            
            
            @if($question->ideas->isEmpty())
            
                <p class="text-white">No ideas yet! Add one!</p>
            
            @else
                <h6 class="d-flex text-white fill-white">
                    @svg('lightbulb', 'mr-2')
                    Ideas
                </h6>
                <div class="cards">
                    @foreach($question->ideas as $idea) 
                        <a class="card bg-light" href="/idea/{{ $idea->id }}">
                            <div class="card-header py-2">
                                {{ $idea->updated_at->diffForHumans() }}
                            </div>
                            <div class="card__content p-3">{{ $idea->title }}
                            </div>
                            <div class="card__footer px-3 py-1 d-flex">
                                <div class="d-flex mr-auto">
                                    {{ sizeOf($idea->votes) }}
                                    @svg('heart', 'ml-2')
                                </div>
                                <div class="d-flex ml-auto">
                                    @svg('pencil')
                                </div>
                            </div>
</a>
                    @endforeach
                </div>
            @endif
            <a class="btn btn-light" href="/question/{{ $question->id }}/idea/create">Add an Idea</a>
        @endisset

            </div>
        </div>
    </div>
</div>
@endsection
