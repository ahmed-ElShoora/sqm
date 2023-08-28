<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en', 'title_ar' ,'description_en', 'description_ar' ,'notes_en', 'notes_ar',
        'image', 'type', 'isDeleted'
        ];
}
