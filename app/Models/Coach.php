<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Coach extends Model
{
    use HasFactory;

    public static function nurseryDetailCoach()
    {
        
        $coach = Coach::where('user_secure_id',Auth::user()->secure_id)->first();
        $nursery = Nursery::where('secure_id',$coach->nurserie_secure_id)->with('game','district')->first();
    return $nursery;

    }


}
