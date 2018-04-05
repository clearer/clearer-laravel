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

    public function owner()
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
}
