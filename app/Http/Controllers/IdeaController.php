<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Question;
use App\Project;
use App\Points;
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
    }
    //
    public function show(Idea $idea) 
    {
        return view('ideas.show', compact(['idea']));
    }

    public function create(Idea $idea)
    {
        return view('ideas.create', compact(['idea']));
    }

    public function edit(Idea $idea)
    {
        $this->authorize('edit', $idea);
        return view('ideas.edit', compact(['idea']));
    }

    public function update(Request $request, Idea $idea)
    {
        $idea = Idea::find($idea->id);
        $idea->acted_on = $request->acted_on;
        $idea->save();
        
        return response($idea->id, 200)->header('Content-Type', 'text/plain');
    }

    public function store(Request $request)
    {

        $teamID = Auth::user()->currentTeam->id;
        $userID = Auth::user()->id;

        $req = array_merge(
            $request->except(['_token']),
            [
                'team_id' => $teamID,
                'user_id' => $userID,
                'acted_on' => false
            ]
        );

        $idea = Idea::create($req);

        Points::create([
            'team_id' => $teamID,
            'user_id' => $userID,
            'points'  => 10
        ]);

        return back();
    }
}
