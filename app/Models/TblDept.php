<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblDept extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    public $guarded = [];

    public function tblStation()
    {
        return $this->belongsTo(TblStation::class, 'stationID');
    }
    public function tblUser()
    {
        return $this->hasMany(TblUser::class,'deptID','deptID');
    }
}
