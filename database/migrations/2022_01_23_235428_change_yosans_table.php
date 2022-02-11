<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeYosansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yosans', function (Blueprint $table) {
            //カラム属性の変更
            $table->string('stage')->change();
            $table->string('content')->change();
            $table->string('web')->change();
            $table->string('movie')->change();
            $table->string('cd')->change();
            $table->string('dvd')->change();
            $table->string('magazine')->change();
            $table->string('train')->change();
            $table->string('travel')->change();
            $table->string('toy')->change();
            $table->string('others')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yosans', function (Blueprint $table) {
            //カラム属性の変更
            $table->integer('stage')->change();
            $table->integer('content')->change();
            $table->integer('web')->change();
            $table->integer('movie')->change();
            $table->integer('cd')->change();
            $table->integer('dvd')->change();
            $table->integer('magazine')->change();
            $table->integer('train')->change();
            $table->integer('travel')->change();
            $table->integer('toy')->change();
            $table->integer('others')->change();
        });
    }
}
