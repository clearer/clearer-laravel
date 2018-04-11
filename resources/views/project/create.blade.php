@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-11 col-md-9">

        <div class="card card-default">
            <div class="card-body">
            
            <form method="POST" action="/project">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Project Title:</label>
                    <input type="text" class="form-control" id="title" name="title" />
                </div>

                <div class="form-group">
                    <label for="context">Additional Context:</label>
                    <textarea id="description" class="form-control" name="description"></textarea>
                </div>

                <input class="btn btn-primary" type="submit" value="Save" />

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
