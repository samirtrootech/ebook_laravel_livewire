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
        Schema::create('users_books', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('users_id')->references('uuid')->on('users')->onDelete('cascade');
            $table->foreignUuid('books_id')->references('uuid')->on('books')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_books');
    }
};
