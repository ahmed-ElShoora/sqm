<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    protected $fillable = [
        'id','question','answer','isDeleted'
    ];

    public function scopeGetBots($query)
    {
        return $query->where('id', 1)->first();
    }
}
