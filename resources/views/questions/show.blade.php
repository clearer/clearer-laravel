@extends('layouts.app')

@section('content')

@if($question->isAnswered())
    <div class="alert alert--success">This question has been answered</div>
@endif

<a class="button button--inline button--dark button--small mb-4" href="/projects/{{ $question->project->id }}">
    <div class="d-flex">
        <i class="material-icons">arrow_back_ios</i>
        Questions
    </div>
</a>

<div class="content">

    <div class="content--primary">

        @component('components.widget')

            @slot('title')
                Ideas
            @endslot

            @slot('headerActions')
            
                @component('components.modal', [ 'isOpen' => false ])

                    @slot('button')
                        <button class="button--dark">
                            <i class="material-icons">add</i>
                            Add an Idea
                        </button>
                    @endslot

                    @slot('header')
                        Add an Idea
                    @endslot

                    @slot('content')
                        @include('ideas.create')
                    @endslot

                @endcomponent

            @endslot

            @slot('nav')
               <!-- <a href="#">Most Likes</a>
                <a href="#">Post Date</a>
                <a href="#">Acted On</a> -->
            @endslot

            @slot('content')
                
                @if($question->ideas->isEmpty())

                    <h3 class="p-8">{{ __("This question doesn't have any ideas, add one!") }}</h3>

                @else

                    <div class="cards">

                        @foreach($question->ideas as $idea)

                            <div class="card {{ $idea->acted_on ? 'card--green' : '' }}">
   
                                <a href="{{ route('ideas.show', $idea->id) }}" class="card__body u-clickable"> 
                                    <h4>{{ $idea->title }}</h4>
                                </a>

                                <div class="card__footer d-flex">

                                    <votes
                                        :votes="{{ $idea->votes }}"
                                        :idea-id="{{ $idea->id }}"
                                        :has-voted="{{ $idea->isVoted($idea->id) ? $idea->isVoted($idea->id)->id : 0 }}">
                                    </votes>

                                    <a href="/ideas/{{ $idea->id }}" class="d-flex ml-4">
                                        <i class="material-icons" style="font-size: .9rem;  color: #aaa; margin-right: .25rem">mode_comment</i>
                                        {{ $idea->comments->count() }}
                                    </a>
                                    
                                    <move-forward
                                        class="d-flex"
                                        style="margin-left: auto;"
                                        :idea-id="{{ $idea->id }}"
                                        :has-been-acted-on="{{ $idea->acted_on }}">
                                    </move-forward>

                                </div>

                            </div>
                        
                        @endforeach

                    </div>

                @endif

            @endslot

        @endcomponent

    </div>

    <div class="content--secondary">

        @component('components.widget')

            @slot('title')
                Question Info
            @endslot

            @slot('content')
                <div class="p-8">

                    <h2>{{ $question->title }}</h2>

                    <h5 class="mt-8 mb-4">Asked By</h5>
                    <div class="flex-align">
                        <img src="{{ $question->user->photo_url }}" class="avatar--sm mr-2" />
                        <p>{{ $question->user->name }}</p>
                    </div>

                    <h5 class="mt-8 mb-4">Decision Due</h5>
                    <p>{{ date('M j, Y', strtotime($question->due_date)) }}</p>

                    <h5 class="mt-8 mb-4">In Project</h5>
                    <p>{{ $question->project->title }}</p>

                    <h5 class="mt-8 mb-4">Description</h5>
                    <p>{{ $question->description }}</p>

                </div>
            @endslot
        @endcomponent

    </div>

</div>

@endsection
