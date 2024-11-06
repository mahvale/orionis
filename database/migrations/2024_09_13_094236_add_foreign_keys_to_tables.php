<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ajouter la colonne 'classroom_id' et définir la clé étrangère
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('classroom_id')->nullable()->after('description');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
        });

        // Ajouter la colonne 'course_id' et définir la clé étrangère
        Schema::table('chapters', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->nullable()->after('title');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        // Ajouter la colonne 'chapter_id' et définir la clé étrangère
        Schema::table('parts', function (Blueprint $table) {
            $table->unsignedBigInteger('chapter_id')->nullable()->after('title');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });

        // Ajouter les colonnes 'chapter_id' et 'part_id', et définir les clés étrangères
        Schema::table('materials', function (Blueprint $table) {
            $table->unsignedBigInteger('chapter_id')->nullable()->after('file');
            $table->unsignedBigInteger('part_id')->nullable()->after('chapter_id');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
        });

        // Ajouter les colonnes 'chapter_id' et 'part_id', et définir les clés étrangères
        Schema::table('exercises', function (Blueprint $table) {
            $table->unsignedBigInteger('chapter_id')->nullable()->after('file');
            $table->unsignedBigInteger('part_id')->nullable()->after('chapter_id');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
        });

        // Ajouter la colonne 'exercise_id' et définir la clé étrangère
        Schema::table('corrections', function (Blueprint $table) {
            $table->unsignedBigInteger('exercise_id')->after('file');
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['classroom_id']);
            $table->dropColumn('classroom_id');
        });

        Schema::table('chapters', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });

        Schema::table('parts', function (Blueprint $table) {
            $table->dropForeign(['chapter_id']);
            $table->dropColumn('chapter_id');
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign(['chapter_id']);
            $table->dropForeign(['part_id']);
            $table->dropColumn('chapter_id');
            $table->dropColumn('part_id');
        });

        Schema::table('exercises', function (Blueprint $table) {
            $table->dropForeign(['chapter_id']);
            $table->dropForeign(['part_id']);
            $table->dropColumn('chapter_id');
            $table->dropColumn('part_id');
        });

        Schema::table('corrections', function (Blueprint $table) {
            $table->dropForeign(['exercise_id']);
            $table->dropColumn('exercise_id');
        });
    }
}
