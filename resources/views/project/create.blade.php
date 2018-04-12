@if ($errors->any())
    <div class="alert alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" class="form" action="/project">

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