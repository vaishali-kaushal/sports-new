<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nursery extends Model
{

    protected $with = ['district', 'game','nurseryStatus'];

    use HasFactory;

    protected $guarded = [];
    
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function game()
    {
        return $this->belongsTo(Game::class,'game_id','id');
    }
    public function nurseryStatus()
    {
        return $this->belongsTo(NurseryApplicationStatus::class,'id','nursery_id');
    }
}
