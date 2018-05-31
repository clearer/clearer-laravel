
    
<h1>{{ $idea->title }}</h1>

<h5>Description</h5>
{{ $idea->description }}

@component('components.widget', ['muted' => true])
    @slot('title')
        Discussion
    @endslot

    @slot('nav')
        <a href="#">Most Recent</a>
    @endslot

    @slot('content')
    @isset($idea->comments)
            
            @if($idea->comments->isEmpty())
        
                <p>No comments yet! Add one!</p>
        
            @else

                    @foreach($idea->comments as $comment) 
                        <div class="list-group-item" id="comment-{{ $comment->id }}">

                            @isset($comment->reply)
                                <div class="text-small"><a href="#{{ $comment->reply->id }}">Replying to {{ $comment->reply->user->name }}</a></div>
                            @endisset

                            {{ $comment->title }}
                            
                            <br/>

                            <div class="float-right">
                                <img src="{{ $comment->user->photo_url }}" class="avatar rounded-circle mr-2" />
                                <span class="text-small">{{ $comment->user->name }} | {{ $comment->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
            @endif
        @endisset
    @endslot
@endcomponent


            

<a href="{{ route('comments.create') }}" class="btn btn-primary mt-4">Add a Comment</a>