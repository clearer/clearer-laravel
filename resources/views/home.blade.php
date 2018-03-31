@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{ $currentTeam->name  }} {{__(' Dashboard')}}</div>

                    <div class="card-body">


                    @isset($projects)
                    
                        @if($projects->isEmpty())
                            
                            {{ __("This team doesn't have any projects, get started!") }}
                        
                        @else
                            <div class="list-group">
                            @foreach($projects as $project)
                                <a class="list-group-item list-group-item-action d-flex" href="/project/{{ $project->id }}">
                                    <div class="w-75">{{ $project->title }}</div>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
