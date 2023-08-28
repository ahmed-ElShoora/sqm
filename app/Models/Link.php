<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'id','home_link','services_link','projects_link','about_link','contact_link',
        'title_ar_home','title_ar_service','title_ar_about','title_ar_project','title_ar_contact','title_en_home','title_en_service','title_en_about','title_en_project','title_en_contact',
        'desc_ar_home','desc_ar_service','desc_ar_about','desc_ar_project','desc_ar_contact','desc_en_home','desc_en_service','desc_en_about','desc_en_project','desc_en_contact',
        'name_ar_home','name_ar_service','name_ar_about','name_ar_project','name_ar_contact','name_en_home','name_en_service','name_en_about','name_en_project','name_en_contact',
        'image_home','image_service','image_about','image_project','image_contact'
    ];

    public function scopeGetLinks($query)
    {
        return $query->where('id', 1)->first();
    }
}
