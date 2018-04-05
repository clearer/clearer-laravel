@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="list-group d-block">
            <a href="/{{ $idea->question->project->team->slug }}/projects" class="list-group-item text-dark">
                @svg('people', 'mr-2')
                {{ $idea->question->project->team->name }}
            </a>
            <a href="/project/{{ $idea->question->project->id }}" class="list-group-item text-dark">
                @svg('project', 'mr-2')
                {{ $idea->question->project->title }}
            </a>
            <a href="/question/{{ $idea->question->id }}/" class="list-group-item  text-dark">
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
    
                        @if($idea->user_id == Auth::id())
                            <a href="/idea/{{ $idea->id }}/edit">
                                @svg('pencil', 'ml-4 mr-2')
                                Edit
                            </a>
                        @endif
                    </div>
                </div>
            <div class="col-lg-10 py-4 px-0">
                <div class="card-title"><h3>{{ $idea->title }}</h3></div>
                <div class="card-subtitle text-muted my-4">{{ $idea->description }}</div>
            </div>
        </div>
        <div class="card-body">
        @isset($idea->comments)
            
            <h6 class="d-flex">
                    @svg('comment-square', 'mr-2')
                    Comments
                </h6>
            
            @if($idea->comments->isEmpty())
            
                <p>No comments yet! Add one!</p>
            
            @else
                <div class="list-group">
                    @foreach($idea->comments as $comment) 
                        <div class="list-group-item" id="comment-{{ $comment->id }}">
                            @isset($comment->reply)
                            <div class="text-small"><a href="#{{ $comment->reply->id }}">Replying to {{ $comment->reply->owner->name }}</a></div>
                            @endisset
                            {{ $comment->text }}
                            <br/>

                            <div class="float-right">
                                <img src="{{ $comment->owner->photo_url }}" class="avatar rounded-circle mr-2" />
                                <span class="text-small">{{ $comment->owner->name }} | {{ $comment->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @endisset
            <a href="/idea/{{ $idea->id }}/comment/create" class="btn btn-primary mt-4">Add a Comment</a>
            </div>
    </div>
</div>
@endsection
