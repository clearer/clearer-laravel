@extends('layouts.app')

@section('content')

<div class="content">

<div class="content--primary">
    
    @component('components.widget')

        @slot('title')
            Projects
        @endslot

        @slot('headerActions')

            @component('components.modal', ['isOpen' => $errors->any() ? true : false ])

                @slot('button')
                    <a href="javascript: void;" class="button">
                        <i class="material-icons">add</i>
                        Create a Project
                    </a>
                @endslot

                @slot('header')
                    Create a Project
                @endslot

                @slot('content')
                    @include('projects.create')
                @endslot

            @endcomponent
            
        @endslot

        @slot('nav')

            @component('components.widget-filter', [
                'filters' => $filters, 
                'sort' => $sort, 
                'reverse' => $reverse
            ])
            @endcomponent
            
            <!--<a href="#">Archived</a>-->
        @endslot

        @slot('content')

            @if($projects->isEmpty())

                <p class="p-8">{{ __("This team doesn't have any projects, add one to get started!") }}</p>

            @else

                <div class="list">
                    @foreach($projects as $project)
                    <a class="list__item list__item--new" href="/projects/{{ $project->id }}">
                        <h4>{{ $project->title }}</h4>
                        <div class="list__item-tools">
                            <img class="avatar--sm" src="{{ $project->user->photo_url }}" />
                        </div>
                    </a>
                    @endforeach
                </div>

            @endif

        @endslot
    @endcomponent

</div>

<div class="content--secondary">

    @if(!$upcoming->isEmpty())

    @component('components.widget')

        @slot('title')
            Upcoming Decisions
        @endslot

        @slot('content')
            <div class="list">
                @foreach($upcoming as $question)
                    <a class="list__item" href="/question/{{ $question->id }}">
                        <h4>{{ $question->title }}</h4>
                        <div class="list__item-tools">
                            <i class="material-icons">update</i>
                            <small>{{ $question->due_date->toFormattedDateString() }}</small>
                        </div>
                    </a>
                @endforeach
            </div>
        @endslot

    @endcomponent

    @endif

    @component('components.widget')

        @slot('title')
            Leaderboard
        @endslot

        @slot('nav')
            <a href="#">Month</a>
            <a href="#">Year</a>
            <a href="#">All-Time</a>
        @endslot

        @slot('content')
            <div class="list">
                @foreach(Auth::user()->currentTeam->users as $user)
                <a class="list__item">
                        <img class="avatar--sm" src="{{ $user->photo_url }}" />
                        <h4>{{ $user->name }}</h4>
                        <div class="list__item-tools">
                            {{ $user->points($user->currentTeam->id) }}
                        </div>  
                    </a>
                @endforeach
            </div>
        @endslot

    @endcomponent

    {{--
    <home :user="user" inline-template>

        <div class="container">
            <!-- Application Dashboard -->
            <div class="row flex-row-reverse justify-content-around">

                <div class="card card-default col-4">

                    <div class="card-body">

                        <h6 class="ml-1 mb-4">
                            @svg('clock', 'mr-2')
                            Upcoming Decisions
                        </h6>

                        <div class="list-group">
                        @foreach($upcoming as $question)
                            <a class="list-group-item list-group-item-action" href="/question/{{ $question->id }}">
                                <small>{{ $question->due_date->toFormattedDateString() }}</small>
                                <h6>{{ $question->title }}</h6>
                            </a>
                        @endforeach
                        </div>
                    </div>
    </div>
                    <div class="card card-default col-7">

                        <div class="card-body">


                            <h6 class="ml-1 mb-4">
                                @svg('project', 'mr-2')
                                My Projects
                            </h6>

                        @isset($projects)

                            @if($projects->isEmpty())

                                {{ __("This team doesn't have any projects, get started!") }}

                            @else
                                <div class="list-group">
                                @foreach($projects as $project)
                                    <a class="list-group-item list-group-item-action d-flex" href="/project/{{ $project->id }}">
                                        <div class="w-75">{{ $project->title }}</div>
                                        {{ $project->team->name }}
                                        <div class="w-25">
                                            <div class="d-flex justify-content-end">
                                                <img src="{{ $project->user->photo_url }}" class="rounded-circle avatar mr-2" />

                                                <div class="d-flex justify-content-end">
                                                </div>
                                            </div>
                                        </div>  
                                    </a>
                                @endforeach
                                </div>

                            @endif

                        @endisset

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </home>--}}
    @endsection

</div>

</div>
