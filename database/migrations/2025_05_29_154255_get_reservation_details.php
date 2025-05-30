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
            DROP PROCEDURE IF EXISTS GetReservationDetails;

            CREATE PROCEDURE GetReservationDetails()
            BEGIN
                SELECT 
                    r.id AS reservation_id,
                    u.id AS user_id,
                    u.name AS user_name,
                    p.id AS package_id,
                    p.price,
                    p.lessons_count,
                    r.status,
                    r.paid,
                    ro.name AS role_name,
                    r.created_at,
                    r.updated_at
                FROM reservations r
                INNER JOIN users u ON r.user_id = u.id
                INNER JOIN packages p ON r.package_id = p.id
                INNER JOIN roles ro ON u.role_id = ro.id
                ORDER BY r.created_at DESC;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GetReservationDetails;');
    }
};
