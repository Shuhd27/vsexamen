<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define the possible package names inside the method
        $names = ['Beginner', 'Gevorderd', 'Pro', 'All-in'];
        return [
            'name' => $this->faker->randomElement($names),
            'price' => $this->faker->randomFloat(2, 199, 649), // Random price between 50 and 500
            'lessons_count' => $this->faker->numberBetween(5, 20), // Random number of lessons between 5 and 20
        ];
    }
}
