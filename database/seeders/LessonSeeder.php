<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lesson::insert([
        //     [
        //         'date' => '2025-06-01',
        //         'location' => 'Utrecht Centrum',
        //         'instructor_id' => 1,
        //         'student_id' => 2,
        //         'reservation_id' => 1,
        //         'status' => 'gepland',
        //         'cancel_reason' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'date' => '2025-06-02',
        //         'location' => 'Amersfoort',
        //         'instructor_id' => 2,
        //         'student_id' => 3,
        //         'reservation_id' => 2,
        //         'status' => 'gepland',
        //         'cancel_reason' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'date' => '2025-06-03',
        //         'location' => 'Rotterdam',
        //         'instructor_id' => 3,
        //         'student_id' => 4,
        //         'reservation_id' => 3,
        //         'status' => 'geannuleerd',
        //         'cancel_reason' => 'Student ziek',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'date' => '2025-06-04',
        //         'location' => 'Den Haag',
        //         'instructor_id' => 4,
        //         'student_id' => 5,
        //         'reservation_id' => 4,
        //         'status' => 'gepland',
        //         'cancel_reason' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'date' => '2025-06-05',
        //         'location' => 'Leiden',
        //         'instructor_id' => 5,
        //         'student_id' => 1,
        //         'reservation_id' => 5,
        //         'status' => 'geannuleerd',
        //         'cancel_reason' => 'Geen vervoer beschikbaar',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}
