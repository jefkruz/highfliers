<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    protected $guarded;

    public function seekers()
    {
        return $this->hasMany(Seeker::class, 'rank_id');
    }
}
