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
        Schema::create('chapitres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('document_url')->nullable();
            $table->unsignedBigInteger('formation_id');
            $table->timestamps();


            $table->foreign('formation_id')
            ->references('id')
            ->on('formations')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapitres');
    }
};
