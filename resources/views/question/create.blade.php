@extends('spark::layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">
        <div class="card card-default">
            <div class="card-header">
                <div class="d-flex">
                    <h4 class="d-flex">Add a Question</h4>
                </div>
            <div class="col-lg-10 py-4 px-0">
                <form method="POST" action="/project/{{ $project->id }}/question">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="question">Question:</label>
                        <input type="text" class="form-control" id="question" name="question" />
                    </div>

                    <div class="form-group">
                        <label for="description">Additional Context:</label>
                        <textarea id="description" class="form-control" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date:</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" />
                    </div>

                    <input type="hidden" name="team_id" value="{{ $project->team->id }}" />

                    <input class="btn btn-primary" type="submit" value="Save" />

                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
