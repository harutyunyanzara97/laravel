<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('liker_id')->unsigned();
            $table->unsignedBigInteger('leader_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('post_likes', function($table) {
            $table->foreign('liker_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('leader_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_likes');
    }
}
