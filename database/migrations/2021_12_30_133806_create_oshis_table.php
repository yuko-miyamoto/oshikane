<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOshisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oshis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('oshi_name');
            $table->string('birthday');
            $table->string('birthday_y');
            $table->string('birthday_m');
            $table->string('birthday_d');
            $table->string('blood');
            $table->string('oshi_height');
            $table->string('oshi_weight');
            $table->string('oshi_group');
            $table->string('history');
            $table->string('history_y');
            $table->string('history_m');
            $table->string('history_d');
            $table->string('tentacles');
            $table->string('oshi_memo');
            $table->string('text_history');
            $table->string('text_point');
            $table->string('text_input');
            $table->string('text_now');
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
        Schema::dropIfExists('oshis');
    }
}
