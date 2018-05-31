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

                        @component('components.modal', [ 'isOpen' => false ])

                            @slot('button')
                                <h4>{{ $idea->title }}</h4>
                            @endslot

                            @slot('header')
                                {{ $idea->title }}
                            @endslot

                            @slot('content')
                                @include('idea.show')
                            @endslot
                            
                        @endcomponent

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

@endsection
