<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Idea;

class Vote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idea_id',
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

}
