@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="list-group d-block">
            
            <a href="/{{ $question->team->slug }}/projects" class="list-group-item text-dark">
                @svg('people', 'mr-2')
                {{ $question->team->name }}
            </a>
            <a href="/project/{{ $question->project->id }}" class="list-group-item text-dark">
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
                        @svg('clock', 'ml-4 mr-2')
                        {{ date('M d', strtotime($question->due_date)) }}
                        @if ($question->user_id == Auth::user()->id)
                            <a href="/question/{{ $question->id }}/edit">
                                @svg('pencil', 'ml-4 mr-2')
                                Edit
                            </a>
                        @endif
                    </div>
                </div>
            <div class="col-lg-10 py-4 px-0">
                <div class="card-title"><h3>{{ $question->title }}</h3></div>
                <div class="card-subtitle text-muted my-4">{{ $question->description }}</div>
            </div>
            </div>
            <div class="card-body bg-dark">
            @isset($question->ideas)
                <h6 class="d-flex text-white fill-white">
                    @svg('lightbulb', 'mr-2')
                    Ideas
                </h6>
            
            
            @if($question->ideas->isEmpty())
            
                <p class="text-white">No ideas yet! Add one!</p>
            
            @else
                <div class="cards">
                    @foreach($question->ideas as $idea) 
                        <div class="card bg-light" >
                            <div class="card-header py-2">
                                {{ $idea->updated_at->diffForHumans() }}
                            </div>
                            <a class="card__content p-3" href="/idea/{{ $idea->id }}">{{ $idea->title }}</a>
                            <div class="card__footer px-3 py-1 d-flex">
                                <votes 
                                    :votes="{{ json_encode(sizeOf($idea->votes)) }}"
                                    :question-id="{{ json_encode($question->id) }}"
                                    :idea-id="{{ json_encode($idea->id) }}"
                                    :has-voted="{{ json_encode($idea->isVoted($idea->id)) }}" 
                                >
                                </votes>
                                @if($question->user_id == Auth::id())
                                    <div class="d-flex ml-auto">
                                        @svg('arrow-right')
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <a class="btn btn-primary mt-2" href="/question/{{ $question->id }}/idea/create">Add an Idea</a>
        @endisset

            </div>
        </div>
    </div>
</div>
@endsection
