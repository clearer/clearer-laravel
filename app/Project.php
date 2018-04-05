<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'title',
        'team_id',
        'user_id'
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

    public function questions()
    { 
        return $this->hasMany('App\Question');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
