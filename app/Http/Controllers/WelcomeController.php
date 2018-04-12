<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class WelcomeController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show()
    {
        return view('welcome.show');
    }

    public function index()
    {
        $this->middleware('auth');
        $this->middleware('teamSubscribed');

        $user = Auth::user();
        $currentTeam = $user->currentTeam;
        return redirect()->route('project.index', [$currentTeam->slug]);
    }
}
