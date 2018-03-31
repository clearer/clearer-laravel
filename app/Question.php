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
        'description',
        'title',
        'owner_id',
        'project_id'
    ];

    protected $dates = [
        'time_due'
    ];


    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function ideas()
    {
        return $this->hasMany('App\Idea');
    }
}
