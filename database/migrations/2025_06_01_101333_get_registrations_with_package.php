<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            DROP PROCEDURE IF EXISTS GetRegistrationsWithPackages;

            CREATE PROCEDURE GetRegistrationsWithPackages()
            BEGIN
                SELECT 
                    r.id AS registration_id,
                    r.name AS Naam,
                    r.email AS Email,
                    r.phone AS Telefoon,
                    p.name AS pakket_naam,
                    p.price AS pakket_prijs,
                    p.lessons_count AS aantal_lessons
                FROM registrations r
                INNER JOIN packages p ON r.package_id = p.id
                ORDER BY r.name ASC;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetRegistrationsWithPackages;');
    }
};
