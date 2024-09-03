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
        Schema::create('featured_news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('status');
            $table->string('date');
            $table->enum('publish',['Yes','No'])->default('Yes');
            $table->enum('show_home',['Yes','No'])->default('Yes');
            $table->enum('unset_featured',['Yes','No'])->default('No');
            $table->timestamps();	
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_news');
    }
};
