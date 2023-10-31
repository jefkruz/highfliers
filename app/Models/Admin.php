<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    protected $connection = 'mysql';
    use HasFactory, Notifiable;

    public $guarded = [];
    public function role()
    {
        return Role::find($this->role_id);
    }


    public function organization()
    {
        return Organization::find($this->organization_id);
    }


    static $rules = [
        'company' => 'required',
        'role_id' => 'required',
    ];
}
