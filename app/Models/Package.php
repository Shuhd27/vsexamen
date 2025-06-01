<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    protected $fillable = [
        'name', // name of the package
        'price',
        'lessons_count', // total number of lessons included in the package
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
