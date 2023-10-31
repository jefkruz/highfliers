<?php

namespace App\Models;

use App\Models\Seeker;
use Illuminate\Database\Eloquent\Model;


class Grade extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];

    function seeker() {
        return $this->belongsTo(Seeker::class);
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
