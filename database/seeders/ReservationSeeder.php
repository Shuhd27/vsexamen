<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reservation::insert([
        //     [
        //         'user_id' => 1,
        //         'package_id' => 1,
        //         'status' => 'gepland',
        //         'paid' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id' => 2,
        //         'package_id' => 2,
        //         'status' => 'geannuleerd',
        //         'paid' => false,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id' => 3,
        //         'package_id' => 3,
        //         'status' => 'gepland',
        //         'paid' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id' => 4,
        //         'package_id' => 1,
        //         'status' => 'geannuleerd',
        //         'paid' => false,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'user_id' => 5,
        //         'package_id' => 4,
        //         'status' => 'gepland',
        //         'paid' => true,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}
