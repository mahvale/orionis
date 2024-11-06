<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassroomIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          // Ajouter une nouvelle colonne classroom_id
        $table->unsignedBigInteger('classroom_id')->nullable();

        // Ajouter la clé étrangère qui pointe vers la table classrooms
        $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           // Supprimer la clé étrangère d'abord
        $table->dropForeign(['classroom_id']);
        
        // Ensuite, supprimer la colonne
        $table->dropColumn('classroom_id');
        });
    }
}
