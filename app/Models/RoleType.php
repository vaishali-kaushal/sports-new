<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleType extends Model
{
    use HasFactory;
    protected $with = ['user_role'];
    protected $guarded = [];
    
    
    public function user_role()
    {
        return $this->belongsTo(RoleGroup::class,'role_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
