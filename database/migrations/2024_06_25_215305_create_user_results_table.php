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
        Schema::create('user_results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('quiz_id')->nullable();
            $table->uuid('answers_id');
            $table->uuid('question_id')->nullable();
            $table->integer('note')->nullable();
            $table->timestamps();

            $table->foreign('question_id')
            ->references('id')
            ->on('questions')
            ->onDelete('cascade');

            $table->foreign('quiz_id')
            ->references('id')
            ->on('quizzes')
            ->onDelete('cascade');

            $table->foreign('answers_id')
            ->references('id')
            ->on('answers')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('user_results');
    }
};
