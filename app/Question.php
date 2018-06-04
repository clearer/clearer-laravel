<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'project_id',
        'team_id',
        'user_id'
    ];

    protected $dates = [
        'due_date'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function ideas()
    {
        return $this->hasMany('App\Idea');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function isAnswered() {
        $answered = array_filter($this->ideas->toArray(), function($idea) {
            if( $idea['acted_on'] ) {
                return true;
            }
        });
        return sizeOf($answered);
    }
}
