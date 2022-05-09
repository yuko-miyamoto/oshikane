<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('oshi_id')->unsigned();
            $table->int('stage')->nullable();
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
            $table->string('train')->nullable();
            $table->string('train_memo')->nullable();
            $table->string('travel')->nullable();
            $table->string('travel_memo')->nullable();
            $table->string('toy')->nullable();
            $table->string('toy_memo')->nullable();
            $table->string('others')->nullable();
            $table->string('others_memo')->nullable();
            $table->string('paid_at');
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
        Schema::dropIfExists('expenses');
        
    }
}
