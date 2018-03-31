<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam
{
    //

    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}
