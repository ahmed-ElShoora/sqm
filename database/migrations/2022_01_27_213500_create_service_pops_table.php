<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_pops', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->longText('icon')->nullable();
            $table->longText('title_en')->nullable();
            $table->longText('title_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('image')->nullable();
            $table->longText('notes_en')->nullable();
            $table->longText('notes_ar')->nullable();
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
        Schema::dropIfExists('service_pops');
    }
}
