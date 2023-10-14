<?php

namespace Database\Factories;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            'title' => fake()->realTextBetween($minNbCharsT = 6, $maxNbCharsT = 30, $indexSizeT = 2),
            'description' => fake()->realTextBetween($minNbChars = 30, $maxNbChars = 90, $indexSize = 2),
            'completed' => false,
            'user_id' => User::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'completed_at' => null,
            'due_date' => now()->addDays(rand(7, 30))->format('Y-m-d'),
        ];
    }
}
