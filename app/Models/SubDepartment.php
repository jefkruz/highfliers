<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    use HasFactory;

    protected $guarded;

    public function department()
    {
        return $this->belongsTo(Organization::class);
    }
    public function station()
    {
        return $this->belongsTo(TblDept::class,'department_id','deptID');
    }

    public function staffcount()
    {
        return SubDepStaff::where('sub_dept_id',$this->id)->count();
    }
    public function staffcountmsnc()
    {
        return SubDepStaff::where('sub_dept_id',$this->id)->count();
    }
}
