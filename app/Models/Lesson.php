<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'date',
        'location',
        'instructor_id',
        'student_id',
        'reservation_id',
        'status',
        'cancel_reason',
    ];

    /**
     * Get the instructor associated with the lesson.
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    /**
     * Get the student associated with the lesson.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    /**
     * Get the reservation associated with the lesson.
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
    /**
     * Get the status of the lesson.
     */
    // public function getStatusAttribute($value)
    // {
    //     return match ($value) {
    //         'ingepland' => 'Ingepland',
    //         'geannuleerd' => 'Geannuleerd',
    //         default => 'Onbekend',
    //     };
    // }
    // /**
    //  * Set the status of the lesson.
    //  */
    // public function setStatusAttribute($value)
    // {
    //     $this->attributes['status'] = match ($value) {
    //         'Ingepland' => 'ingepland',
    //         'Geannuleerd' => 'geannuleerd',
    //         default => 'ingepland',
    //     };
    // }
}
