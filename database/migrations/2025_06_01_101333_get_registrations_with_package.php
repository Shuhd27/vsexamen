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
            DROP PROCEDURE IF EXISTS GetSubscriptionsWithPackages;

            CREATE PROCEDURE GetSubscriptionsWithPackages()
            BEGIN
                SELECT 
                    s.id AS subscription_id,
                    s.name AS Naam,
                    s.email AS Email,
                    s.phone AS Telefoon,
                    p.name AS pakket_naam,
                    p.price AS pakket_prijs,
                    p.lessons_count AS aantal_lessons
                FROM subscriptions s
                INNER JOIN packages p ON s.package_id = p.id
                ORDER BY s.name ASC;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetSubscriptionsWithPackages;');
    }
};
