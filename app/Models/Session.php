<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'capacity',
        'description',
        'start_time',
        'end_time',
        'category_id',
        'trainer_id'
    ];
    public function members()
    {
        return $this->belongsToMany(Member::class, 'membersessions', 'session_id', 'member_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }
}
