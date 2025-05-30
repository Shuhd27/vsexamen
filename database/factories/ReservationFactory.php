<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Package;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(['role_id' => 2])->id, // Gebruik role_id ipv role
            'package_id' => Package::factory()->create()->id,
            'status' => $this->faker->randomElement(['gepland', 'geannuleerd']),
            'paid' => $this->faker->boolean(80), // 80% kans dat de reservering betaald is
        ];
    }
}
