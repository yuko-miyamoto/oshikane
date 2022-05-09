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
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('oshi_id')->unsigned();
            $table->integer('stage')->nullable();
            $table->string('stage_memo')->nullable();
            $table->integer('concert')->nullable();
            $table->string('concert_memo')->nullable();
            $table->integer('web')->nullable();
            $table->string('web_memo')->nullable();
            $table->integer('movie')->nullable();
            $table->string('movie_memo')->nullable();
            $table->integer('cd')->nullable();
            $table->string('cd_memo')->nullable();
            $table->integer('dvd')->nullable();
            $table->string('dvd_memo')->nullable();
            $table->integer('magazine')->nullable();
            $table->string('magazine_memo')->nullable();
            $table->integer('media')->nullable();
            $table->string('media_memo')->nullable();
            $table->integer('others')->nullable();
            $table->string('others_memo')->nullable();
            $table->date('stocked_at');
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
