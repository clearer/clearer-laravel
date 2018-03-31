<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Question;
use Auth;

class IdeaController extends Controller
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
    public function show(Idea $idea) 
    {
        return view('idea.show', compact(['idea']));
    }

    public function create(Question $question)
    {
        return view('idea.create', compact(['question']));
    }

    public function store(Question $question)
    {
        $idea = new Idea;  
        $idea->title = request('title');
        $idea->description = request('description');
        $idea->question_id = $question->id;
        $idea->owner_id = Auth::user()->id;
        $idea->save();

        return redirect()->route('question', [$question->id]);
    }
}
