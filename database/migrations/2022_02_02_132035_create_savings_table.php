<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stage')->nullable();
            $table->string('stage_memo')->nullable();
            $table->string('concert')->nullable();
            $table->string('concert_memo')->nullable();
            $table->string('web')->nullable();
            $table->string('web_memo')->nullable();
            $table->string('movie')->nullable();
            $table->string('movie_memo')->nullable();
            $table->string('cd')->nullable();
            $table->string('cd_memo')->nullable();
            $table->string('dvd')->nullable();
            $table->string('dvd_memo')->nullable();
            $table->string('magazine')->nullable();
            $table->string('magazine_memo')->nullable();
            $table->string('media')->nullable();
            $table->string('media_memo')->nullable();
            $table->string('others')->nullable();
            $table->string('others_memo')->nullable();
            $table->string('stocked_at');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('oshi_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('savings');
    }
}
