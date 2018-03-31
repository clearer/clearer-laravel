@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="list-group d-block">
            <a href="/{{ $question->project->team->slug }}/projects" class="list-group-item text-dark">
                @svg('people', 'mr-2')
                {{ $question->project->team->name }}
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
                        <div class="card bg-light" >
                            <div class="card-header py-2">
                                {{ $idea->updated_at->diffForHumans() }}
                            </div>
                            <a class="card__content p-3" href="/idea/{{ $idea->id }}">{{ $idea->title }}</a>
                            <div class="card__footer px-3 py-1 d-flex">
                                <form method="POST" id="favorite-{{ $idea->id }}" action="{{ $idea->isVoted($idea->id) ? '/vote/' . $idea->isVoted($idea->id)->id : '/vote' }}">
                                    {{ csrf_field() }}
                                    @if ( $idea->isVoted($idea->id))
                                        {{ method_field('DELETE') }}
                                    @endif
                                    <input type="hidden" name="question_id" value="{{ $question->id }}" />
                                    <input type="hidden" name="idea_id" value="{{ $idea->id }}" />
                                    <a href="javascript:document.forms['favorite-{{ $idea->id }}'].submit()" class="d-flex mr-auto" >
                                        {{ sizeOf($idea->votes) }}
                                        @svg('heart', ( $idea->isVoted($idea->id) ? 'ml-2 active' : 'ml-2'))
                                    </a>
                                </form>
                                <div class="d-flex ml-auto">
                                    @svg('pencil')
                                </div>
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
