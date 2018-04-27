@component('components.errors')
@endcomponent

<div class="half-and-half">

<form method="POST" class="form" action="/project/{{ $project->id }}/question">

    {{ csrf_field() }}

    <div class="form__group">
        <label for="question">Question</label>
        <input type="text" class="form-control" id="question" name="title" value="{{ old('question') }}" />
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

<div>
    <h5 class="mb-4">Things to Consider</h5>

    <p>Is your question as direct as possible?</p>

    <p>Have you clearly stated the problem you’d like to develop a solution for?</p>

    <p>What does success look like?</p>

    <p>How will you know you’re succeeding?</p>

    <p>Should any specific people or teams weigh in on this question before a decision is made?</p>

    <p>How does answering this question propel you forward?</p>

    <p>How does failing to answer this question inhibit progress?</p>

    <p>Does this question depend on answering another one? </p>




</div>

</div>