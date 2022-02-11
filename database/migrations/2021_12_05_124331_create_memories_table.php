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
            $table->string('stage_name');
            $table->string('artist');
            $table->string('place');
            $table->string('ticket');
            $table->string('stage_memo');
            $table->string('s_list_01');
            $table->string('s_list_02');
            $table->string('s_list_03');
            $table->string('s_list_04');
            $table->string('s_list_05');
            $table->string('s_list_06');
            $table->string('s_list_07');
            $table->string('s_list_08');
            $table->string('s_list_09');
            $table->string('s_list_10');
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
