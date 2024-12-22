<?php

namespace Database\Factories;

use App\Models\WeightLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WeightLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 50, 100),
            'calories' => $this->faker->numberBetween(1500, 3500),
            'exercise_time' => $this->faker->time($format = 'H:i:s'),
            'exercise_content' => $this->faker->sentence(),
        ];
    }
}
