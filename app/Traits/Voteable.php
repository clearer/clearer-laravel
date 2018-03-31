<?php

namespace app\Traits;

use App\Vote;
use Illuminate\Support\Facades\Cache;
use Auth;
use DB;

trait Voteable {
    public function isVoted($ideaId)
    {
        
        return DB::table('votes')
            ->where('owner_id', Auth::user()->id)
            ->where('idea_id', $ideaId)
            ->first();
    }
}