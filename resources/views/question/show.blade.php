@extends('layouts.app')

@section('content')

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
                        Create a New Idea
                    @endslot

                    @slot('content')
                        @include('idea.create')
                    @endslot


                @endcomponent

            @endslot

            @slot('nav')
                <a href="#">Most Likes</a>
                <a href="#">Post Date</a>
                <a href="#">Acted On</a>
            @endslot

            @slot('content')
                
                @if($question->ideas->isEmpty())

                    <h3 class="p-8">{{ __("This question doesn't have any ideas, add one!") }}</h3>

                @else

                    <div class="cards">
                        @foreach($question->ideas as $idea)
                        <div class="card">
                            <a href="/idea/{{ $idea->id }}">
                                <h4>{{ $idea->title }}</h4>
                            </a>
                            <votes
                                :votes="{{ $idea->votes }}"
                                :idea-id="{{ $idea->id }}"
                                :has-voted="{{ $idea->isVoted($idea->id) ? $idea->isVoted($idea->id)->id : 0 }}">
                            </votes>
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
                Project Info
            @endslot

            @slot('content')
                <div class="p-8">

                    <h1>{{ $question->title }}</h1>

                    <h5 class="mt-8 mb-4">Asked By</h5>
                    <div class="flex-align">
                        <img src="{{ $question->user->photo_url }}" class="avatar--sm mr-2" />
                        <p>{{ $question->user->name }}</p>
                    </div>

                    <h5 class="mt-8 mb-4">Decision Due</h5>
                    <p>{{ date('m d, Y', strtotime($question->due_date)) }}</p>

                    <h5 class="mt-8 mb-4">In Project</h5>
                    {{ $question->project->title }}

                    <h5 class="mt-8 mb-4">Description</h5>
                    {{ $question->description }}

                </div>
            @endslot
        @endcomponent

    </div>

</div>

{{--

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
                        <img src="{{ $question->user->photo_url }}" class="avatar rounded-circle mr-2" />
                        {{ $question->user->name }}
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

--}}    
@endsection
