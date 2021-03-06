@component('components.errors')
@endcomponent

<form method="POST" class="form" action="/projects">

    {{ csrf_field() }}

    <div class="form__group">
        <label for="title">Project Title</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" />
    </div>

    <div class="form__group">
        <label for="context">Additional Context</label>
        <textarea id="description" name="description">{{ old('description')  }}</textarea>
    </div>

    <button type="submit" class="button">
        <i class="material-icons">save</i>
        Save
    </button>

</form>