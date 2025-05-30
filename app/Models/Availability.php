<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Package;

class Availability extends Model
{
    use HasFactory;
    
    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'instructor_name', // Naam van de instructeur
        'status', // 'beschikbaar' or 'niet beschikbaar'
    ];

    // Relationships, indien gewenst
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
