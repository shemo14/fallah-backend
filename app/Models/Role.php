<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role'
    ];

    public function Permissions()
    {
        return $this->hasMany('App\Models\Permission','role_id','id');
    }
}
