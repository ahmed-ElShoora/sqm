<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ABout extends Model
{
    use HasFactory;
    protected $fillable = [
        'description_en', 'description_ar' ,'vision_en', 'vision_ar' ,'mission_en', 'mission_ar','image'
        ];
}
