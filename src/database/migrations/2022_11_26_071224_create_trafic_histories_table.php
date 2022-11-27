<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraficHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_communication_histories', function (Blueprint $table) {
            $table->id();
            $table->year('year')->comment('年度');
            $table->integer('month')->comment('月');
            $table->integer('data_communication_amount')->comment('通信量(gb)');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_communication_histories');
    }
}
