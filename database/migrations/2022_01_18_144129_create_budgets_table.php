<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('register_year');
            $table->string('register_month');
            $table->integer('total_budget')->nullable();
            $table->integer('stage')->nullable();
            $table->integer('concert')->nullable();
            $table->integer('web')->nullable();
            $table->integer('movie')->nullable();
            $table->integer('cd')->nullable();
            $table->integer('dvd')->nullable();
            $table->integer('magazine')->nullable();
            $table->integer('train')->nullable();
            $table->integer('travel')->nullable();
            $table->integer('toy')->nullable();
            $table->integer('others')->nullable();
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
        Schema::dropIfExists('budgets');
    }
}
