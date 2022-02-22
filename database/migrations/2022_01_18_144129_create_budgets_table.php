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
            $table->string('total_budget')->nullable();
            $table->string('stage')->nullable();
            $table->string('concert')->nullable();
            $table->string('web')->nullable();
            $table->string('movie')->nullable();
            $table->string('cd')->nullable();
            $table->string('dvd')->nullable();
            $table->string('magazine')->nullable();
            $table->string('train')->nullable();
            $table->string('travel')->nullable();
            $table->string('toy')->nullable();
            $table->string('others')->nullable();
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
        Schema::dropIfExists('budgets');
    }
}
