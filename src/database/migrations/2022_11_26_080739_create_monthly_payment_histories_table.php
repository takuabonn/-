<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_line_id')->comment('契約回線ID');
            $table->unsignedBigInteger('month_billing_history_id')->comment('請求履歴ID');
            $table->integer('payment_status')->nullable(false)->default(0)->comment('支払い状況(未納:0,完了:1)');
            $table->year('year')->comment('年度');
            $table->integer('month')->comment('支払い月');
            $table->integer('payment_amount');
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
        Schema::dropIfExists('monthly_payment_histories');
    }
}
