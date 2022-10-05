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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('harga');
            $table->integer('stok');
            $table->mediumText('deskripsi');
            $table->string('foto')->nullabel();

            $table->tinyInteger('status')->default('0')->comment('0=tampilkan,1=hidden');
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
        Schema::dropIfExists('category');
    }
};
