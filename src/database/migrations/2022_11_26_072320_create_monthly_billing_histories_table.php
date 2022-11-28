<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyBillingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_billing_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable(false)->comment('UUID');
            $table->unsignedBigInteger('contract_line_id')->nullable(false)->comment('契約回線ID');
            $table->year('year')->comment('年度');
            $table->integer('month')->comment('請求月');
            $table->integer('rate_plan_amount')->nullable()->comment('料金プラン料金');
            $table->integer('call_charges')->nullable()->comment('通話料金');
            $table->integer('additional_data_communication_amount')->nullable()->comment('追加データ通信量');
            $table->integer('additional_data_communication_charges')->nullable()->comment('追加のデータ通信量料金');
            $table->integer('model_division_amount')->comment('端末分割代金');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー
            $table->foreign('contract_line_id', 'fk_contract_line_id_monthly_billing_histories')->references('id')->on('contract_lines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_billing_histories');
    }
}
