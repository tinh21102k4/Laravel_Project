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
        Schema::create('image_url', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img_url')->nullable();
            $table->unsignedInteger('news_id');
            $table->enum('image_type', ['main' , 'secondary'])->default('main');
            $table->foreign('news_id')->references('id')->on('news')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_url');
    }
};
