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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
         
            $table->unsignedBigInteger('user_id'); // Adding user_id column
            $table->string('image')->nullable();
            $table->text('content');
           
            $table->tinyInteger('is_delete')->default(0)->comment('0:not,1:yes');
            $table->string('author');
            $table->date('date');
            $table->tinyInteger('status')->default(0)->comment('0:active,1:Inactive')->nullable();
            $table->timestamps();

         
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Setting up foreign key for user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
