<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Voteable;

class Idea extends Model
{
    use Voteable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'question_id',
        'team_id',
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
