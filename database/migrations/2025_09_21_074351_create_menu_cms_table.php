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
        Schema::create('menu_cms', function (Blueprint $table) {
            $table->id();
            $table->string('main_id')->default(0);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->string('icon')->nullable();
            $table->integer('orderno')->nullable();
            $table->boolean('published');
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
        Schema::dropIfExists('menu_cms');
    }
};
