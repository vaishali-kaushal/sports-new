<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleGroup extends Model
{
    use HasFactory;
    public function getGroupId($role)
    {
        $roleGroupID = RoleGroup::where('role_name',$role)->first();
        return $roleGroupID;
    }
}
