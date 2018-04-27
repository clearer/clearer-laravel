<form method="POST" class="form" action="{{ isset($idea->id) ? route('idea.update', $idea) : route('idea.store') }}">

    {{ csrf_field() }}

    @if (isset($idea->id))
        {{ method_field('PUT') }}
    @endif

    <div class="form__group">
        <label for="question">Idea:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $idea->title }}" />
    </div>

    <div class="form__group">
        <label for="description">Additional Context:</label>
        <textarea id="description" class="form-control" name="description">{{ $idea->description }}</textarea>
    </div>

    <button class="button" type="submit">
        <i class="material-icons">save</i>
        Save
    </button>

</form>