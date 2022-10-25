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
        Schema::create('patiekalas_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patiekalas_id');
            $table->foreign('patiekalas_id')->references('id')->on('patiekalas');
            $table->string('url', 300);
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
        Schema::dropIfExists('patiekalas_images');
    }
};
