<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyGoals extends Model
{
    use HasFactory;

    protected $guarded;
    public function staff()
    {
        return $this->belongsTo(Seeker::class,'user_id');
    }
}
