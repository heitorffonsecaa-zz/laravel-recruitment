<?php

namespace Database\Factories;

use App\Models\ActivityHistory;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActivityHistoryFactory extends Factory
{
    protected $model = ActivityHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'title' => $this->faker->jobTitle(),
            'company_name' => $this->faker->company(),
            'description' => $this->faker->text(),
            'city_id' => City::all()->random()->first()->id
        ];
    }
}
