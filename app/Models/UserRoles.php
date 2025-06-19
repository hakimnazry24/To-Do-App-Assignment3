<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $fillable = [
        "roleId",
        "userId",
        "roleName",
        "description",
    ];
}
