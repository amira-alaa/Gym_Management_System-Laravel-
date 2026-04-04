<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'duration_days',
    ];
    public function members(){
        return $this->belongsToMany(Member::class , 'Memberships' , 'plan_id' , 'member_id');
    }
}
