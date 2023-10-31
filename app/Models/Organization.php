<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Organization
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Organization extends Model
{

    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;
    protected $connection = 'mysql';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    public $guarded = [];

    public function owner()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function seeker()
    {
        return $this->hasMany(Seeker::class);
    }


    public function staff()
    {
       return Seeker::where('organization_id',$this->id)->get();
     }

}
