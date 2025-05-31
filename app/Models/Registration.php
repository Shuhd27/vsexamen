<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrationFactory> */
    use HasFactory;

    protected $fillable = [
        'package_id',
        'name',
        'email',
        'phone'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
