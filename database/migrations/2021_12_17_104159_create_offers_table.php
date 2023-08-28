<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('type_ar');
            $table->string('title_ar')->nullable();
            $table->longText('description_ar')->nullable();
            $table->integer('type_en');
            $table->string('title_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->double('price');
            $table->string('city_ar');
            $table->string('town_ar');
            $table->string('city_en');
            $table->string('town_en');
            $table->integer('room')->default(1);
            $table->integer('bathroom')->default(1);
            $table->longText('facilities_ar')->nullable();
            $table->longText('services_ar')->nullable();
            $table->longText('facilities_en')->nullable();
            $table->longText('services_en')->nullable();
            $table->string('offerStatus')->default('available');
            $table->string('rentType')->default('yearly');
            $table->integer('isNew')->default(1);
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->longText('thumbnail')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('seller_phone')->nullable();
            $table->string('seller_email')->nullable();
            $table->string('seller_domain')->nullable();
            $table->longText('seller_image')->nullable();
            $table->integer('isDeleted')->default(0);
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
        Schema::dropIfExists('offers');
    }
}
