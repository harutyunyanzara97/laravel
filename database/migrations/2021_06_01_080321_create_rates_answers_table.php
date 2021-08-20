
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rater_id')->unsigned();
            $table->unsignedBigInteger('leader_id')->unsigned();
            $table->string('title');
            $table->timestamps();
        });
        Schema::table('rates_answers', function($table) {
            $table->foreign('rater_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('leader_id')->references('id')->on('answers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates_answers');
    }
}
