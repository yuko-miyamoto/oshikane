<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('stage_name');
            $table->string('artist');
            $table->string('place');
            $table->string('concert')->nullable();
            $table->string('stage')->nullable();
            $table->string('stage_memo');
            $table->string('s_list_01')->nullable();
            $table->string('s_list_02')->nullable();
            $table->string('s_list_03')->nullable();
            $table->string('s_list_04')->nullable();
            $table->string('s_list_05')->nullable();
            $table->string('s_list_06')->nullable();
            $table->string('s_list_07')->nullable();
            $table->string('s_list_08')->nullable();
            $table->string('s_list_09')->nullable();
            $table->string('s_list_10')->nullable();
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('memories');
    }
}
