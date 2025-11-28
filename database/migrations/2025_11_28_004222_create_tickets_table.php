<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('event_id'); // harus sama tipe dengan events.id
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->enum('type', ['VIP', 'Reguler']);
            $table->decimal('price', 10, 2);
            $table->integer('quota');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket'); //
    }
};
