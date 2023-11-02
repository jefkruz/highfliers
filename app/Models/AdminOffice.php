<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminOffice
 *
 * @property $id
 * @property $admin_id
 * @property $organization_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Admin $admin
 * @property Organization $organization
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AdminOffice extends Model
{



    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $guarded;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function admin()
    {
        return $this->hasOne('App\Models\Admin', 'id', 'admin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function organizationcount()
    {
        return Organization::find($this->organization_id);
    }
    public function organization()
    {
        return $this->hasOne('App\Models\Organization', 'id', 'organization_id');
    }
    public function station()
    {
        return $this->hasOne('App\Models\TblStation', 'stationID', 'station_id');
    }
    public function department()
    {
        return $this->hasOne('App\Models\TblDept', 'deptID', 'department_id');
    }


}
