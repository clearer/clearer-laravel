<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use App\Team; 
use App\Project;
use App\Question;
use App\Idea;
use Carbon\Carbon;
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

    public function index(Request $request) 
    {

        $user = Auth::user();
        $team = $user->currentTeam();

        $request->user()->switchToTeam($team);
        
        $projects = Project::where('team_id', $team->id)
            ->where('user_id', $user->id)
            ->get();

        $upcoming = Question::where('team_id', $team->id)
            ->where('due_date', '<', Carbon::now()->addWeeks(2))
            ->where('due_date', '>=', Carbon::now())
            ->get();
       
        return view('projects.index', compact(['projects', 'upcoming', 'recent']));
    }

    public function show(Project $project) 
    {
        return view('projects.show', ['project' => $project]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $user               = Auth::user();
        $project->title     = request('title');
        $project->description   = request('description'); 
        $project->save();

        return back();
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'bail|required|max:255',
            'description' => 'required'
        ]);
        
        $user               = Auth::user();
        $project            = new Project;
        $project->title     = request('title');
        $project->description   = request('description');
        $project->user_id  = $user->id;
        $project->team_id   = $user->currentTeam->id;
        $project->save();

        return back();
    }
}
