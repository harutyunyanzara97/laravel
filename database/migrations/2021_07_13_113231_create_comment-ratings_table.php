<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment-ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->integer('rate');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->timestamps();
        });
        Schema::table('comment-ratings', function($table) {
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('comment-ratings', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
