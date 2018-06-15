@extends('layouts.app')

@section('content')

    @if(Session::has('message'))
        <div class="alert alert--success">
            {{ Session::get('message') }}
        </div>
    @endif

    <a class="button button--inline button--dark button--small mb-4" href="/questions/{{ $idea->question->id }}">
        <div class="d-flex">
            <i class="material-icons">arrow_back</i>
            Ideas
        </div>
    </a>

    <div class="content">

        <div class="content--primary">

            @component('components.widget')
            
                @slot('title')
                    Idea Discussion
                @endslot
            
                @slot('headerActions')
            
                    @component('components.modal', ['isOpen' => $errors->any() ? true : false ])
            
                        @slot('button')
                            <button class="button--dark button--small">
                                <i class="material-icons">add</i>
                                Add a Comment
                            </button>
                        @endslot
                        
                        @slot('header')
                            Add a New Comment
                        @endslot
                        
                        @slot('content')
                            @include('comments.create')
                        @endslot
                        
                    @endcomponent
                        
                @endslot
                        
                @slot('nav')
                    <!--<a href="#">Most Recent</a>-->
                @endslot
                        
                @slot('content')
                        
                    @isset($idea->comments)
                        
                        <div class="list">

                            @if($idea->comments->isEmpty())
                        
                                <p class="py-4 px-6">No comments yet! Add one!</p>
                        
                            @else
                        
                                @foreach($idea->comments as $comment) 
                                    <div class="list__item" id="comment-{{ $comment->id }}">
                                        <div>
                                            <p>{{ $comment->title }}</p>
                                            <p class="text--small">{{ $comment->updated_at->diffForHumans() }}</p>
                                        </div>
                                    
                                        <div class="list__item-tools">
                                            <img src="{{ $comment->user->photo_url }}" class="avatar rounded-circle mr-2" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                                
                        </div>
                    
                    @endisset
                    
                @endslot
                    
            @endcomponent

        </div>

        <div class="content--secondary">

            @component('components.widget')

                @slot('title')
                    Idea Details
                @endslot

                @slot('content')

                    <div class="p-8">

                        <h2>{{ $idea->title }}</h2>

                        @if($idea->description)
                            <h5 class="mt-8 mb-2">Description</h5>
                            {{ $idea->description }}
                        @endif

                    </div>

                @endslot

            @endcomponent

        </div>

    </div>

@endsection