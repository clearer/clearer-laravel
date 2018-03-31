<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Project;
use Auth;

class ProjectController extends Controller
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
    public function show(Project $project) {
        return view('project.show', compact(['project']));
    }

    public function create()
    {
        $user           = Auth::user();
        $currentTeam    = $user->currentTeam;

        return view('project.create', [$currentTeam]);
    }

    public function store()
    {
        $user               = Auth::user();
        $project            = new Project;
        $project->title     = request('title');
        $project->context   = request('context');
        $project->color     = '#ffffff';
        $project->owner_id  = $user->id;
        $project->team_id   = $user->currentTeam->id;
        $project->save();

        return redirect()->route('project.index', [$user->currentTeam->slug]);
    }
}
