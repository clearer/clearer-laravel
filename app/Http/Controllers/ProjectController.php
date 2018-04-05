<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
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

    public function index() {

        $user = Auth::user();
        $teams = [];

        foreach ($user->teams as $team) {
            array_push($teams, $team->id);
        }
        
        $projects = Project::whereIn('team_id', $teams)
            ->where('user_id', $user->id)
            ->get();

        $upcoming = Question::whereIn('team_id', $teams)
            ->where('due_date', '<', Carbon::now()->addWeeks(2))
            ->where('due_date', '>=', Carbon::now())
            ->get();
       
        return view('project.index', compact(['projects', 'upcoming', 'recent']));
    }

    public function show(Project $project) {
        return view('project.show', compact(['project']));
    }

    public function create()
    {
        $user           = Auth::user();
        $currentTeam    = $user->currentTeam;

        return view('project.create', [$currentTeam]);
    }

    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $user               = Auth::user();
        $project->title     = request('title');
        $project->context   = request('context'); 
        $project->save();

        return redirect()->route('project.show', [$project]);
    }

    public function store()
    {
        $user               = Auth::user();
        $project            = new Project;
        $project->title     = request('title');
        $project->context   = request('context');
        $project->color     = '#ffffff';
        $project->user_id  = $user->id;
        $project->team_id   = $user->currentTeam->id;
        $project->save();

        return redirect()->route('project.index', [$user->currentTeam->slug]);
    }
}
