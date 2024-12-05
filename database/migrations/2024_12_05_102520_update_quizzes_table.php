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
        Schema::table('quizzes', function (Blueprint $table) {
            // Rendre la colonne formation_id nullable
            $table->unsignedBigInteger('formation_id')->nullable()->change();
    
            // Ajouter la colonne chapitre_id (nullable)
            $table->unsignedBigInteger('chapitre_id')->nullable();
    
            // Ajouter la clé étrangère pour chapitre_id
            $table->foreign('chapitre_id')
                ->references('id')
                ->on('chapitres')
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
        Schema::table('quizzes', function (Blueprint $table) {
            //
        });
    }
};
