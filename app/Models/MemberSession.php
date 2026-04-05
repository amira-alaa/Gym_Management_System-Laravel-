<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membersession extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
