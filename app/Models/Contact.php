<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_en', 'address_ar' ,'mail', 'phone', 'latitude', 'longitude'
        ];
}
