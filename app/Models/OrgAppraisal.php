<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgAppraisal extends Model
{
    protected $connection = 'mysql';
    protected $table= 'org_appraisals';
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
