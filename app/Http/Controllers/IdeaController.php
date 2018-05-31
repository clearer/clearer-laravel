<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Question;
use App\Project;
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

    public function create(Idea $idea)
    {
        return view('idea.create', compact(['idea']));
    }

    public function edit(Idea $idea)
    {
        $this->authorize('edit', $idea);
        return view('idea.edit', compact(['idea']));
    }

    public function update(Idea $idea)
    {
        $idea->title = request('title');
        $idea->description = request('description');
        $idea->save();

        return back();
    }

    public function store(Request $request)
    {
        $req = array_merge(
            $request->except(['_token']),
            [
                'team_id' => Auth::user()->currentTeam->id,
                'user_id' => Auth::user()->id
            ]
        );

        $idea = Idea::create($req);
        $idea->user->addPoints(10);

        return back();
    }
}
