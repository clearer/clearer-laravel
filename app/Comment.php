<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'comment_id',
        'idea_id',
        'project_id',
        'question_id',
        'team_id',
        'user_id'
    ];

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function replies()
    {
        return $this->hasMany('App\Comment');
    }

    public function reply() {
        return $this->belongsTo('App\Comment');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
