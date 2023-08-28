<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class BestHouse extends Model
{
    protected $table = 'besthouses';
    protected $fillable = [
        'id','title_ar','title_en','desc_ar','desc_en'
    ];

    public function scopeSeeBestHouse($query)
    {
        return $query->select(
            'title_'.App::getLocale().' as title',
            'desc_'.App::getLocale().' as desc'
        )->where('id', 1);
    }
}
