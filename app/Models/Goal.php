<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    use HasFactory;

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }

    public function GGoals()
    {
        return $this->hasOne(OrgAppraisal::class, 'id', 'appraisals_id');
    }
}
