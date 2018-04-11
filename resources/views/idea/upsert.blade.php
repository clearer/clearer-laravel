<form method="POST" action="{{ isset($idea->id) ? route('idea.update', $idea) : route('idea.store') }}">

    {{ csrf_field() }}

    @if (isset($idea->id))
        {{ method_field('PUT') }}
    @endif

    <div class="form-group">
        <label for="question">Idea:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $idea->title }}" />
    </div>

    <div class="form-group">
        <label for="description">Additional Context:</label>
        <textarea id="description" class="form-control" name="description">{{ $idea->description }}</textarea>
    </div>

    <input class="btn btn-primary" type="submit" value="{{ isset($idea->id) ? 'Update' : 'Save' }}" />

</form>