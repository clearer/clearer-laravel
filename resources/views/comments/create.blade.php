@component('components.errors')
@endcomponent

            <form method="POST" class="form" action="{{ route('comments.store') }}">

                    {{ csrf_field() }}

                    <div class="form__group">
                        <label for="question">Comment</label>
                        <textarea id="title" name="title" style="height: 8em;"></textarea>
                        <input type="hidden" name="idea_id" value="{{ $idea->id }}" />
                    </div>

                    <input class="button mt-8" type="submit" value="Save" />

                </form>
