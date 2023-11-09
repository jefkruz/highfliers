<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NomenclatureRank
 *
 * @property $id
 * @property $nomenclature_category_id
 * @property $nomenclature_group_id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property NomenclatureCategory $nomenclatureCategory
 * @property NomenclatureGroup $nomenclatureGroup
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NomenclatureRank extends Model
{
    
    static $rules = [
		'nomenclature_category_id' => 'required',
		'nomenclature_group_id' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nomenclature_category_id','nomenclature_group_id','name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nomenclatureCategory()
    {
        return $this->hasOne('App\Models\NomenclatureCategory', 'id', 'nomenclature_category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nomenclatureGroup()
    {
        return $this->hasOne('App\Models\NomenclatureGroup', 'id', 'nomenclature_group_id');
    }
    

}
