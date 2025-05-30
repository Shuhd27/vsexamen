<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Maak rollen aan zonder factory, handmatig:
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'leerling']);
        // Role::create(['name' => 'instructeur']);
    }
}
