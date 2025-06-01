<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;
use App\Models\Reservation;
use App\Models\Lesson;
use App\Models\Availability;
use App\Models\Role;
use Database\Seeders\PackageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PackageSeeder::class);

        // Andere seeders (indien nodig)
        // $this->call(RoleSeeder::class);
        // $this->call(ReservationSeeder::class);
        // $this->call(LessonSeeder::class);
        // $this->call(AvailabilitySeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        // Verwijder deze regel omdat enum veld beperkt is
        // Package::factory(5)->create();

        Reservation::factory(5)->create();
        Lesson::factory(5)->create();
        Availability::factory(5)->create();
        Role::factory(5)->create();
    }
}
