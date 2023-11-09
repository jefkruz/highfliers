<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NomenclatureGroup
 *
 * @property $id
 * @property $nomenclature_category_id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property NomenclatureCategory $nomenclatureCategory
 * @property NomenclatureRank[] $nomenclatureRanks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NomenclatureGroup extends Model
{
    
    static $rules = [
		'nomenclature_category_id' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nomenclature_category_id','name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nomenclatureCategory()
    {
        return $this->hasOne('App\Models\NomenclatureCategory', 'id', 'nomenclature_category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nomenclatureRanks()
    {
        return $this->hasMany('App\Models\NomenclatureRank', 'nomenclature_group_id', 'id');
    }
    

}
