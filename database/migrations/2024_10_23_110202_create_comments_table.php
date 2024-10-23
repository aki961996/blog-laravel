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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('blog_id'); 

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Setting up foreign key for user_id
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade'); // Setting up foreign key for blog_id

            
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
