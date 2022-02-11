<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYosansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yosans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('stage')->nullable();
            $table->integer('content')->nullable();
            $table->integer('web')->nullable();
            $table->integer('movie')->nullable();
            $table->integer('cd')->nullable();
            $table->integer('dvd')->nullable();
            $table->integer('magazine')->nullable();
            $table->integer('train')->nullable();
            $table->integer('travel')->nullable();
            $table->integer('toy')->nullable();
            $table->integer('others')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('yosans');
    }
}
