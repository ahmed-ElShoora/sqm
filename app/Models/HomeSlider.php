<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $fillable = [
         'description_en', 'description_ar' ,'image','image_phone', 'isDeleted','color'
        ];
}
