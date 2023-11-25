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

    public function user()
    {
        return $this->belongsTo(TblUser::class,'user_id','userID');
    }

    public function subdepartment()
    {
        return $this->belongsTo(SubDepartment::class,'sub_dept_id');
    }

    public function department()
    {
        return $this->belongsTo(Organization::class,'dept_id');
    }

    public function station()
    {
        return $this->belongsTo(TblDept::class,'dept_id','deptID');
    }

    public function hod()
    {

        return $this->belongsTo(SubDeptHod::class,'sub_dept_id','sub_dept_id');
    }
}
