<?php

namespace App\Services;

use App\Models\Skill;

class SkillService
{
    public function getAllSkills($withTrashed = false)
    {
        return Skill::when($withTrashed, function ($query){
            return $query->withTrashed();
        })->get();
    }
}
