<?php

namespace App\Traits;

use App\Models\GameSection;

trait Part
{
    public function gameSection($project_game_id)
    {
        $part = 1;
        if($project_game_id){
            $gs = GameSection::where('game_project_id', $project_game_id)->max('part');
            $part = $gs + 1;
        }

        return $part;
    }
}

