<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;

class TeamController extends Controller
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
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
        $user = Auth::user();
        $currentTeam = $user->currentTeam;

        $projects = Project::where('team_id', $currentTeam->id)->get();
       
        return view('project.index', compact(['projects', 'currentTeam']));
    }
}
