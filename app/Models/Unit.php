<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $guarded;

    public function Organization()
    {
        return $this->belongsTo(Organization::class,'department_id','id');
    }


    public function subdept()
    {
        return $this->belongsTo(SubDepartment::class,'sub_department_id','id');
    }


}
