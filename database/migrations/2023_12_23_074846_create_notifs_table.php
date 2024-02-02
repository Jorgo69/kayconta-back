<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');

            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->string('title');
            $table->longText('content');
            $table->text('image')->nullable();
            $table->text('for')->nullable(); // les role concerner User|Author|Admin
            $table->enum('answer', ['yes', 'no'])->default('no');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifs');
    }
};