<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDepStaff extends Model
{
    use HasFactory;

    protected $guarded;
    protected $table = 'sub_dept_staffs';

    public function staff()
    {
        return $this->belongsTo(Seeker::class,'user_id');
    }

    public function subdepartment()
    {
        return $this->belongsTo(SubDepartment::class);
    }

    public function department()
    {
        return $this->belongsTo(Organization::class,'dept_id');
    }
}
