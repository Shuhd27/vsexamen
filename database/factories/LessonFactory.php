<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Reservation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'location' => $this->faker->address(),
            'instructor_id' =>User::factory()->create(['role' => 'instructeur'])->id,
            'student_id' =>User::factory()->create(['role' => 'leerling'])->id,
            'reservation_id' =>Reservation::factory(),
            'status' => $this->faker->randomElement(['gepland', 'geannuleerd']),
            'cancel_reason' => $this->faker->optional()->sentence(),
        ];
    }
}
