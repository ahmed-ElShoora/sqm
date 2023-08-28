<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'progress';
    protected $fillable = [
        'id','title_ar','title_en','num','image','isDeleted'
    ];
}
