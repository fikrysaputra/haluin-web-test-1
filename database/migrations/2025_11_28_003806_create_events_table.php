<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) { // plural
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name')->unique(); // Nama Event Tidak Boleh Sama
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('poster')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('quota_reguler')->default(0);
            $table->integer('quota_vip')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
