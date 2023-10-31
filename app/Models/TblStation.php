<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblStation extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    public $guarded = [];
    protected $primaryKey = 'stationID';

    public function tblDept()
    {
        return $this->hasMany(TblDept::class,'stationID','stationID');
    }
}


