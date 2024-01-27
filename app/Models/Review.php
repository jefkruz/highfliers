<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function Organization()
    {
        return $this->belongsTo(Organization::class);
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
