<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    //
    protected $fillable = [
        'team_id',
        'user_id',
        'points'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
