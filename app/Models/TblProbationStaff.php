<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblProbationStaff extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    public $guarded = [];
}
