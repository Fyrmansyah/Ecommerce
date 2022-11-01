<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('image_id');
            $table->unsignedBigInteger('produks_id');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('produks_id')->references('id')->on('produks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_images');
    }
};
