<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeYosansTableColumnConcert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yosans', function (Blueprint $table) {
            //
            $table->renameColumn('content', 'concert');
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
            //
            $table->renameColumn('concert', 'content');
        });
    }
}
