<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            ['name' => 'Beginner', 'price' => 199.00, 'lessons_count' => 5],
            ['name' => 'Gevorderd', 'price' => 349.00, 'lessons_count' => 10],
            ['name' => 'Pro', 'price' => 499.00, 'lessons_count' => 15],
            ['name' => 'All-in', 'price' => 649.00, 'lessons_count' => 20],
        ];

        foreach ($packages as $package) {
            Package::updateOrCreate(['name' => $package['name']], $package);
        }
    }
}
