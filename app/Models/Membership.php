<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'plan_id',
        'start_date',
        'end_date',
    ];
    public function status(){
        return $this->end_date >= now() ? "Active" : "Expired"; 
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
