<?php

namespace App\Models;

use App\Enums\Specialties;
use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'specialties',
        'gender',
        'building_no',
        'street',
        'city',
    ];

    protected $casts = [
        'specialties' => Specialties::class,
        'gender' => Gender::class,
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class , 'trainer_id' , 'id');
    }
}
