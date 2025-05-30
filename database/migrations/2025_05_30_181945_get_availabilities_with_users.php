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
            DROP PROCEDURE IF EXISTS GetAvailabilitiesWithUsers;

            CREATE PROCEDURE GetAvailabilitiesWithUsers(IN _limit INT, IN _offset INT)
            BEGIN
                SELECT 
                    a.id AS availability_id,
                    a.status,
                    u.id AS user_id,
                    u.name AS user_name,
                    u.email
                FROM availabilities a
                INNER JOIN users u ON a.user_id = u.id
                ORDER BY u.name ASC;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetAvailabilitiesWithUsers;');
    }
};
