<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [

         'name',
        'email',
        'phone',
        'gender',
        'date_of_birth',
        'building_no',
        'street',
        'city',
        'health_record',
        // 'health_record.weight',
        // 'health_record.blood_type',

    ];

    protected $casts = [
        'gender' => Gender::class,
        'health_record' => 'array'
    ];

    public function plans()
    {
        return $this->belongsToMany( Plan::class , 'Memberships' , 'member_id' , 'plan_id');
    }
    public function sessions(){
        return $this->belongsToMany( Session::class , 'member_sessions' , 'member_id' , 'session_id');
    }
}
