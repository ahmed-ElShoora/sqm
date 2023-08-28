<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'id',
        'title',
        'email',
        'whats_app_phone',
        'logo',
        'footer_description_en',
        'footer_description_ar',
        'meta_keywords',
        'fav_icon',
        'footer_copyRights_en',
        'footer_copyRights_ar',
        'footer_facebook',
        'footer_instagram',
        'footer_linkedin',
        'footer_snapchat',
        'bot_header_question_en',
        'bot_header_question_ar',
        'bot_footer_question_en',
        'bot_footer_question_ar' ,
        'bot_search_part_en',
        'bot_search_part_ar',
        'bot_welcome_message',
        'bot_closing_message',
        'show_bot',
        'show_ads',
        'show_filter',
        'project_desc_ar',
        'project_desc_en',
    ];

    public function scopeGetSetting($query)
    {
        return $query->where('id', 1)->first();
    }
    
    public function scopeGetDesc($query)
    {
        return $query->select('footer_description_'.App::getLocale().' as desc')->where('id', 1)->first();
    }

    public function scopeGetSearch($query)
    {
        return $query->select(
            'bot_search_part_'.App::getLocale().' as bot'
        )->where('id', 1)->first();
    }
}
