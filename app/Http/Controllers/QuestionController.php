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
        $ideas = $question->ideas;
        return view('question.show', compact(['question', 'ideas']));
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
            'title'         => 'bail|required|max:255',
            'description'   => 'required',
            'due_date'      => 'required'
        ]);

        $req = array_merge( 
            $request->except(['_token']), 
            [
                'team_id' => Auth::user()->currentTeam->id,
                'user_id' => Auth::user()->id
            ] 
        );

        //dd($req);

        $project
            ->questions()
            ->create( $req );
            


       /*$question = new Question();

        $question->title = request('title');
        $question->description = request('description');
        $question->due_date = request('due_date');
        $question->user_id = Auth::user()->id;
        $question->project_id = $project->id;
        $question->team_id = Auth::user()->currentTeam->id;
        $question->save();
        */

        return redirect()->route('project.show', [$project]);
    }
}
