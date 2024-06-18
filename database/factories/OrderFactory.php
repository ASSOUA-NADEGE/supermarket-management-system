<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::parse('-12 months');
        $end = now();
        $user = User::query()->role('vendor')->inRandomOrder()->first();

        return [
            'vendor_id' => $user->id,
            'created_at' => $this->faker->dateTimeBetween(Carbon::parse('-2 months'), $end),
        ];
    }
}
