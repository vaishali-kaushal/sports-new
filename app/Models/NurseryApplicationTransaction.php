<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseryApplicationTransaction extends Model
{
    use HasFactory;

	public $timestamps = false;

    protected $fillable = [
        'nursery_id',
        'transaction_date',
        'action_by',
        'remarks'
    ];
    
}
