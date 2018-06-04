<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Question;
use App\Points;
use Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $req = array_merge(
            $request->except(['_token']),
            [
                'user_id' => Auth::user()->id
            ]
        );

        $vote = Vote::create($req);
        
        $teamID = $vote->idea->team->id;
        $userID = $vote->idea->user->id;
        
        Points::create([
            'team_id' => $teamID,
            'user_id' => $userID,
            'points'  => 5
        ]);

        return response($vote->id, 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $vote = Vote::find($id);

        $teamID = $vote->idea->team->id;
        $userID = $vote->user->id;

        Points::create([
            'team_id' => $teamID,
            'user_id' => $userID,
            'points'  => -5
        ]);

        Vote::destroy($id);

        return response('Vote deleted', 200)->header('Content-Type', 'text/plain');
    }
}
