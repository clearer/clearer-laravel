@component('components.errors')
@endcomponent

<form method="POST" class="form" action="{{ route('ideas.store') }}">

    {{ csrf_field() }}

    <div class="form__group">
        <label for="question">Idea</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
    </div>

    <div class="form__group">
        <label for="description">Additional Context</label>
        <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
    </div>

    <input type="hidden" name="question_id" value="{{ $question->id }}" />
    <input type="hidden" name="project_id" value="{{ $question->project->id }}" />

    <button class="button" type="submit">
        <i class="material-icons">save</i>
        Save
    </button>

</form>