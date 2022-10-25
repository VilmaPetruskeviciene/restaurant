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
        Schema::create('patiekalas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->decimal('price', 5, 2);
            $table->string('rating', 4, 2)->nullable();
            $table->unsignedBigInteger('rating_sum')->default(0);
            $table->unsignedBigInteger('rating_count')->default(0);
            $table->unsignedBigInteger('restoranas_id');
            $table->foreign('restoranas_id')->references('id')->on('restoranas');
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
        Schema::dropIfExists('patiekalas');
    }
};
