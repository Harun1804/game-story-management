<?php

namespace App\Traits;

use App\Models\GameSection;

trait Persentase
{
    public function project($projectID)
    {
        $totalSections = GameSection::whereGameProjectId($projectID)->count();
        $totalFinishSections = GameSection::whereGameProjectId($projectID)->finishSection()->count();
        $result = 0;
        if($totalSections > 0){
            $result = $totalFinishSections / $totalSections * 100;
        }

        return $result;
    }
}

