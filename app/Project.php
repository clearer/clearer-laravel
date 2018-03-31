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
        'color',
        'context',
        'owner_id',
        'team_id',
        'title'
    ];

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
