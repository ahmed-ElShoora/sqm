<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePop extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon', 'title_en', 'title_ar' ,'description_en', 'description_ar' ,'notes_en', 'notes_ar',
        'image', 'type', 'isDeleted'
        ];
}
