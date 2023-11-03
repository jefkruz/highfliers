<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 *
 * @property $id
 * @property $organization_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Organization $organization
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Admin extends Model
{

    static $rules = [
		'organization_id' => 'required',
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded;




    public function role()
    {
        return Role::find($this->role_id);
    }


    public function organization()
    {
        return $this->hasOne('App\Models\Organization', 'id', 'organization_id');
    }

    public function department()
    {
        return $this->hasOne('App\Models\TblDept', 'deptID', 'department_id');
    }

    public function adminOffices() {
        return $this->hasMany(AdminOffice::class, 'admin_id', 'id');
    }


}
