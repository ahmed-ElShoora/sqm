<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'views',
        'type_id_ar',
        'description_ar',
        'type_id_en',
        'description_en',
        'thumbnail',
        'title_ar',
        'title_en',
        'price',
        'city_ar',
        'town_ar',
        'city_en',
        'town_en',
        'room',
        'bathroom',
        'facilities_ar',
        'services_ar',
        'facilities_en',
        'services_en',
        'offerStatus',
        'rentType',
        'latitude',
        'longitude',
        'isNew',
        'seller_name',
        'seller_phone',
        'seller_email',
        'seller_domain',
        'seller_image',
        'isDeleted',
        'nav_text_ar',
        'nav_text_en',
        'nav_color',
        'comer',
        'size',
        ];
}
