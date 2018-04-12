<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Question;
use App\Project;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teamSubscribed');
    }
    //
    public function show(Question $question)
    {
        return view('question.show', compact(['question']));
    }

    public function edit(Question $question)
    {

        return view('question.edit', compact(['question']));
    }

    public function update(Question $question)
    {
        $question->title        = request('question');
        $question->description  = request('description');
        $question->due_date     = request('due_date');
        $question->save();
        return redirect()->route('question.show', [$question]);
    }

    public function store(Request $request, Project $project)
    {
        $validateData = $request->validate([
            'question'      => 'bail|required|max:255',
            'description'   => 'required',
            'due_date'      => 'required'
        ]);
        
        $question = new Question;
        $question->title = request('question');
        $question->description = request('description');
        $question->due_date = request('due_date');
        $question->user_id = Auth::user()->id;
        $question->project_id = $project->id;
        $question->team_id = Auth::user()->currentTeam->id;
        $question->save();

        return redirect()->route('project.show', [$project]);
    }
}
