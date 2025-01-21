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
        Schema::create('notequizzes', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->string('titre')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->unsignedBigInteger('formation_id')->nullable();
            $table->unsignedBigInteger('chapitre_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('notequizzes');
    }
};
