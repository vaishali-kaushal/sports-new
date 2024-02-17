<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $with = ['district'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'secure_id',
        'name',
        'email',
        'password',
        'mobile',
        'district_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function role()
    {
        return $this->belongsTo(RoleType::class, 'id', 'user_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function getUsers($role)
    {
        $roleGroupID = RoleGroup::where('role_name',$role)->first();
        $users = RoleType::where('role_id', $roleGroupID->id)->with('user')->get()->toArray();
        return $users;
    }
    public function getPlayers($role,$coachId)
    {
        $roleGroupID = RoleGroup::where('role_name',$role)->first();
        $users = RoleType::where('role_id', $roleGroupID->id)->where('coach_id',$coachId)->with('user')->get()->toArray();
        return $users;
    }
}
