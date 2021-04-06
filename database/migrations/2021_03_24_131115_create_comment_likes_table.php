<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('liker_id')->unsigned();
            $table->unsignedBigInteger('leader_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('comment_likes', function($table) {
            $table->foreign('liker_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('leader_id')->references('id')->on('comments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_likes');
    }
}
