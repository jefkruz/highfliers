<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminOffice extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $guarded;

    public function org()
    {
        return $this->belongsTo(Organization::class);
    }
    public function user()
    {
        return $this->belongsTo(Admin::class);
    }
//    public function organization()
//    {
//        return Organization::find($this->organization_id);
//    }


}
