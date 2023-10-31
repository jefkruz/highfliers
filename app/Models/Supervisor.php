<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }
}
