<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'data_type',
        'target_id'
    ];

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

}
