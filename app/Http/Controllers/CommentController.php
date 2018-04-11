<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Comment;
use Auth;

class CommentController extends Controller
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
    public function create(Idea $idea)
    {
        //
        return view('comment.create', compact(['idea']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Idea $idea)
    {
        //
        $comment = new Comment();
        $comment->title = request('title');
        $comment->idea_id = $idea->id;
        $comment->team_id = $idea->team_id;
        $comment->question_id = $idea->question_id;
        $comment->project_id = $idea->project_id;
        $comment->user_id = Auth::user()->id;
        $comment->comment_id = 0;
        $comment->save();

        return redirect()->route('idea.show', compact(['idea']));
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
    }
}
