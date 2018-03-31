<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function show($id) {
        $question = Question::where('id', $id)->first();
        return view('question.show', compact(['question']));
    }

    public function create($id) {
        $project = Project::where('id', $id)->first();
        return view('question.create', compact(['project']));
    }
}
