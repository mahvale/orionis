<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForumIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
             $table->unsignedBigInteger('forum_id')->nullable();
             $table->unsignedBigInteger('user_id')->nullable();
             $table->foreign('forum_id')->references('id')->on('forums')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['forum_id']);
            $table->dropColumn('forum_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}