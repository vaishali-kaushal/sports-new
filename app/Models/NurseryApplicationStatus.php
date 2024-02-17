<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseryApplicationStatus extends Model
{
    use HasFactory;
    protected $with = ['remark'];
    protected $guarded =[];
    public function nursery()
    {
        return $this->belongsTo(Nursery::class,'nursery_id','id');
    }
    public function remark()
    {
        return $this->belongsTo(ApplicationRemark::class,'id','application_status_id');
    }
}
