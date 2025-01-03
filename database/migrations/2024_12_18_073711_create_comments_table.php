<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Jika komentar dikaitkan dengan pengguna
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Jika komentar dikaitkan dengan post
            $table->foreignId('comment_id')->nullable()->constrained('comments')->onDelete('cascade'); // Untuk reply
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
