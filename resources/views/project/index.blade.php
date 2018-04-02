@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-around">
                <div class="card card-default col-7">

                    <div class="card-body">

                        <div class="mb-4">

                            <h6 class="ml-1 mb-4">
                                @svg('clock', 'mr-2')
                                Upcoming Decisions
                            </h6>

                            <div class="list-group">
                            @foreach($upcoming as $question)
                                <a class="list-group-item list-group-item-action d-flex" href="/question/{{ $question->id }}">
                                    <div class="w-75">{{ $question->title }}</div>
                                    {{ $question->team->name }}
                                    <div class="w-25">
                                        <div class="d-flex justify-content-end">
                                            <img src="{{ $question->owner->photo_url }}" class="rounded-circle avatar mr-2" />
                                            
                                            <div class="d-flex justify-content-end">
                                            </div>
                                        </div>
                                    </div>  
                                </a>
                            @endforeach
                            </div>
                        </div>

                        
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
                                            <img src="{{ $project->owner->photo_url }}" class="rounded-circle avatar mr-2" />
                                            
                                            <div class="d-flex justify-content-end">
                                            </div>
                                        </div>
                                    </div>  
                                </a>
                            @endforeach
                            </div>

                        

                        
                        
                        @endif
                        
                    @endisset

                    <a class="btn btn-primary mt-4" href="/project/create">Add a Project</a>

                    </div>
                </div>

                <div class="card card-default col-4">

                    <div class="card-body">
                    <h6 class="ml-1 mb-4">
                            @svg('clock', 'mr-2')
                            Latest Ideas
                        </h6>

                            <div class="list-group">
                            @foreach($recent as $idea)
                                <a class="list-group-item list-group-item-action" href="/question/{{ $idea->question->id }}">
                                    <div>{{ str_limit($idea->question->title, $limit = 140, $end = '...') }}</div>
                                    {{ $idea->team->name }}
                                    <div>
                                        <div class="d-flex justify-content-end">
                                            <img src="{{ $idea->owner->photo_url }}" class="rounded-circle avatar mr-2" />
                                            
                                            <div class="d-flex justify-content-end">
                                            </div>
                                        </div>
                                    </div>  
                                </a>
                            @endforeach
                            </div>
</div>
</div>
        </div>
    </div>
</home>
@endsection
