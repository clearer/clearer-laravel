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
    }
    //

    public function index(Request $request) 
    {
        $user = Auth::user();
        $team = $user->currentTeam();

        $sort = $request->query('sort');
        $reverse = $request->query('reverse');

        if(!$sort) {
            $sort = 'updated_at';
            $reverse = 'true';
        }

        $filters = [
            (object)[
                'slug' => 'updated_at',
                'title' => 'Latest Activity'
            ],
            (object)[
                'slug' => 'title',
                'title' => 'Alphabetical'
            ]
        ];

        $sortMethod = $reverse ? 'sortByDesc' : 'sortBy';

        $projects = collect($team->projects)->$sortMethod($sort);

        $upcoming = Question::where('team_id', $team->id)
            ->where('due_date', '<', Carbon::now()->addWeeks(2))
            ->where('due_date', '>=', Carbon::now())
            ->get();
       
        return view('projects.index', compact(['projects', 'upcoming', 'recent', 'sort', 'reverse', 'filters']));
    }

    public function show(Request $request, Project $project) 
    {
        $user = Auth::user();
        $team = $user->currentTeam();

        if(!$user->onTeam($project->team)) {
            abort(404);
        }

        $sort = $request->query('sort');
        $reverse = $request->query('reverse');

        if(!$sort) {
            $sort = 'updated_at';
            $reverse = 'true';
        }


        $filters = [
            (object)[
                'slug' => 'updated_at',
                'title' => 'Latest Activity'
            ],
            (object)[
                'slug' => 'due_date',
                'title' => 'Decision Due'
            ],
            (object)[
                'slug' => 'title',
                'title' => 'Alphabetical'
            ]
        ];

        $sortMethod = $reverse ? 'sortByDesc' : 'sortBy';

        $questions = collect($project->questions)->$sortMethod($sort);

        return view('projects.show', compact('project', 'questions', 'sort', 'reverse', 'filters'));
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

        $user = Auth::user();
        $team = $user->currentTeam;

        $projectMax = $team->sparkPlan()->attributes['max_projects'];
        $projectCurrent = $team->projects->count();
        $projectsRemain = $projectMax - $projectCurrent;

        if($projectsRemain < 1) {
            return back()->withErrors(['msg' => 'You\'ve reached the project limits on your team\'s subscription. <a href="#">Upgrade your plan</a>']);
        }

        $validateData = $request->validate([
            'title' => 'bail|required|max:255',
            'description' => 'required'
        ]);
        
        $user               = $user;
        $project            = new Project;
        $project->title     = request('title');
        $project->description   = request('description');
        $project->user_id  = $user->id;
        $project->team_id   = $user->currentTeam->id;
        $project->save();

        $team = Team::find($user->currentTeam->id);

        return back();
    }
}
