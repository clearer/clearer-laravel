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
        'idea_id',
        'owner_id',
        'reply_to',
        'text'
    ];

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Comment');
    }

    public function reply() {
        return $this->belongsTo('App\Comment', 'reply_to');
    }
}
