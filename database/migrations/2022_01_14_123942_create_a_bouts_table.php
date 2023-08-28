<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateABoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_bouts', function (Blueprint $table) {
            $table->id();
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->longText('vision_en');
            $table->longText('vision_ar');
            $table->longText('mission_en');
            $table->longText('mission_ar');
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
        Schema::dropIfExists('a_bouts');
    }
}
