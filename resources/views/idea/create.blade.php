@component('components.errors')
@endcomponent

<form method="POST" class="form" action="{{ route('idea.store', $question) }}">

    {{ csrf_field() }}

    <div class="form__group">
        <label for="question">Idea</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
    </div>

    <div class="form__group">
        <label for="description">Additional Context</label>
        <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
    </div>

    <button class="button" type="submit">
        <i class="material-icons">save</i>
        Save
    </button>

</form>