<?php

namespace Database\Factories;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityLogFactory extends Factory
{
    protected $model = ActivityLog::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence, // Sesuaikan kolom dengan 'description'
        ];
    }
}
