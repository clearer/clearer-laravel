<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Question;
use App\Project;
use Illuminate\Support\Facades\DB;


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
    }
    //
    public function show(Question $question)
    {
        return view('questions.show', ['question' => $question]);
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
        return redirect()->route('questions.show', [$question]);
    }

    public function store(Request $request, Question $question)
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

        $question = Question::create($req);

        $project = DB::table('projects')->where('id', $request->project_id)->first();
            
        return redirect()->route('projects.show', [$request->project_id]);
    }
}
