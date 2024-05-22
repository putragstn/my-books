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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default(1)->constrained('users');
            $table->string('book_image', 128)->default('book-image.png');
            $table->string('book_title', 128)->default('Unknown Book Title');
            $table->foreignId('author_id')->constrained('authors');
            $table->foreignId('publisher_id')->constrained('publishers');
            $table->date('release_date');
            $table->integer('page');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('status_baca', 32)->default('Belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
