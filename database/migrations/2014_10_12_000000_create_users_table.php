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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_categorie_id');
            $table->string('name');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('post');
            $table->string('corps')->nullable();
            $table->string('sex')->nullable();
            $table->string('diplome')->nullable();
            $table->string('specialie')->nullable();
            $table->string('services')->nullable();
            $table->string('age')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->string('nombre_enfant')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');


            $table->foreign('user_categorie_id')
            ->references('id')
            ->on('user_categories')
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
        Schema::dropIfExists('users');
    }
};
