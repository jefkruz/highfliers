<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblReview extends Model
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
        return $this->belongsTo(TblUser::class,'seeker_id','userID');
    }

    public function Organization()
    {
        return $this->belongsTo(TblDept::class,'organization_id','deptID');
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function nomenclature()
    {
        return NomenclatureCategory::find($this->nomenclature_category_id);
    }

    public function nomenclatureGroup()
    {
        return NomenclatureGroup::find($this->nomenclature_group_id);
    }
    public function nomenclatureRank()
    {
        return NomenclatureRank::find($this->nomenclature_rank_id);
    }
}
