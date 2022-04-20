<?php

namespace Database\Seeders;

use App\Models\ActivityHistory;
use App\Models\Role;
use App\Models\Skill;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CandidateUsersSeeder extends Seeder
{
    const COUNT_USERS = 5000;
    const COUNT_BUSINESS_HISTORY = 1;
    const COUNT_SKILLS = 10;

    private $faker;

    public function __construct()
    {
        $this->faker = new Faker();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(self::COUNT_USERS)
            ->for(Role::where('slug', 'candidate')->first(), 'role')
            ->create()
            ->each(function (User $user){
                $age = Carbon::parse($user->birthdate)->age;
                $lastJobTimeInDays = rand(0, (($age - 16) * 365));
                $unemployedTimeInDays = rand(0, (6 * 365));

                $endDate = Carbon::now()->subDays($unemployedTimeInDays)->format('Y-m-d');
                $startDate = Carbon::parse($endDate)->subDays($lastJobTimeInDays)->format('Y-m-d');

                ActivityHistory::factory()
                    ->count(self::COUNT_BUSINESS_HISTORY)
                    ->for($user, 'user')
                    ->create([
                        'type' => 'business',
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                    ]);

                $skills = Skill::inRandomOrder()->limit(rand(0, self::COUNT_SKILLS))->get();;
                $experienceTimesSkills = getExperienceTimesSkills();

                $userSkills = [];
                foreach ($skills as $skill){
                    $userSkills[$skill->id] = ['experience_time' => $experienceTimesSkills[array_rand($experienceTimesSkills, 1)]];
                }

                $user->skills()->attach($userSkills);
            });
    }
}
