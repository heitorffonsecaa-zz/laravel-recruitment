<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'uuid' => Str::uuid(),
                'name' => 'PHP',
                'slug' => 'php'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Python',
                'slug' => 'python'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Java',
                'slug' => 'java'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'VueJS',
                'slug' => 'vue-js'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'ReactJS',
                'slug' => 'react-js'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'NodeJS',
                'slug' => 'node-js'
            ],
        ];

        foreach ($skills as $skill){
            Skill::create($skill);
        }
    }
}
