@if ($errors->any())
    <div class="alert alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" class="form" action="/project/{{ $project->id }}/question">

    {{ csrf_field() }}

    <div class="form__group">
        <label for="question">Question</label>
        <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}" />
    </div>

    <div class="form__group">
        <label for="description">Additional Context</label>
        <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
    </div>

    <div class="form__group">
        <label for="due_date">Due Date</label>
        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date') }}" />
    </div>

    <button class="button" type="submit">
        <i class="material-icons">save</i>
        Save
    </button>

</form>