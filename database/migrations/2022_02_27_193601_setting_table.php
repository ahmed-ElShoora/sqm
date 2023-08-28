<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('whats_app_phone');
            $table->longText('logo');
            $table->longText('fav_icon');
            $table->longText('footer_description_en');
            $table->longText('footer_description_ar');
            $table->string('footer_copyRights_en');
            $table->string('footer_copyRights_ar');
            $table->longText('footer_facebook');
            $table->longText('footer_instagram');
            $table->longText('footer_linkedin');
            $table->longText('footer_snapchat');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('bot_header_question_en');
            $table->string('bot_header_question_ar');
            $table->string('bot_footer_question_en');
            $table->string('bot_footer_question_ar');
            $table->string('bot_search_part_en');
            $table->string('bot_search_part_ar');
            $table->string('bot_welcome_message');
            $table->string('bot_closing_message');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
