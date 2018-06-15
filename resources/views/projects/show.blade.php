@extends('layouts.app')

@section('content')
<a class="button button--inline button--dark button--small mb-4" href="/projects">
    <div class="d-flex">
        <i class="material-icons">arrow_back</i>
        Projects
    </div>
</a>

    <div class="content">
    
        <div class="content--primary">
        
            @component('components.widget')
        
                @slot('title')
                    Questions
                @endslot
        
                @slot('headerActions')
        
                    @component('components.modal', ['isOpen' => $errors->any() ? true : false ])
        
                        @slot('button')
                            <button class="button--dark">
                                <i class="material-icons">add</i>
                                Add a Question
                            </button>
                        @endslot
                        
                        @slot('header')
                            Create a New Question
                        @endslot
                            
                        @slot('content')
                            @include('questions.create')
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
                        
                @endslot
                        
                @slot('content')
                        
                    @if($questions->isEmpty())
                        <h3 class="p-8">{{ __("This project doesn't have any questions, add one!") }}</h3>
                    @else
                        <div class="list">
                        
                            @foreach($questions as $question)
                                <a class="list__item" href="/questions/{{ $question->id }}">
                                
                                    @if($question->isAnswered())
                                        
                                        <i class="material-icons">check</i>
                                
                                    @endif
                                
                                    <h4>{{ $question->title }}</h4>
                                    <div class="list__item-tools">
                                        <i class="material-icons">av_timer</i> {{ $question->due_date->diffForHumans() }}
                                        <img class="avatar--sm" src="{{ $question->user->photo_url }}" />
                                    </div>
                                </a>
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
                    
                        <h2>{{ $project->title }}</h2>
                    
                        <h5 class="mt-8 mb-4">Project Lead</h5>
                        <div class="flex-align">
                            <img src="{{ $project->user->photo_url }}" class="avatar--sm mr-2" />
                            <p>{{ $project->user->name }}</p>
                        </div>
                    
                        <h5 class="mt-8 mb-4">Description</h5>
                        <p>{{ $project->description }}</p>
                    </div>
                @endslot
            @endcomponent
                
        </div>
    </div>

@endsection
