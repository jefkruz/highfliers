<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblUser extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;
    public $guarded = [];

    public function tblDept()
    {
        return $this->belongsTo(TblDept::class, 'deptID','deptID');
    }

    public function TblManifestsUser()
    {
        return $this->hasMany(TblManifestsUser::class, 'userID','userID');
    }

    public function tblRank()
    {
        return $this->belongsTo(TblRank::class,'rank_id');
    }
    public function level()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
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
