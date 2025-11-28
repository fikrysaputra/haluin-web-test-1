<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_tickets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            // Foreign key relationship with 'users' table
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Foreign key relationship with 'tickets' table
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');

            // Additional fields
            $table->integer('quantity')->default(1);  // Quantity of tickets purchased
            $table->string('qr_code')->unique();  // Unique QR code for the ticket
            $table->string('status')->default('active');  // Status of the ticket (e.g., active, paid)
            $table->timestamp('purchased_at')->useCurrent();  // Timestamp when the ticket was purchased

            $table->timestamps();  // Created_at and updated_at fields
        });
    }

    public function down()
    {
        // Corrected table name to 'user_tickets'
        Schema::dropIfExists('user_tickets');
    }
};
