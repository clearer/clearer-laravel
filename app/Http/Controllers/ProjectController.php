<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Project;

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
}
