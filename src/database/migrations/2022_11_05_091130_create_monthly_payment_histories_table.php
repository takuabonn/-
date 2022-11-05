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
            $table->uuid('uuid')->unique()->comment('uuid');
            $table->unsignedBigInteger('contract_line_id')->nullable(false)->comment('契約回線ID');
            $table->integer('paid_amount')->default(0)->nullable(false)->comment('支払った金額');
            $table->string('payment_status', 1)->default('0')->nullable(false)->comment('料金支払い状態(未納:0,完了:1)');
            $table->string('year', 255)->nullable(false)->comment('年度');
            $table->integer('month')->nullable(false)->comment('支払い月');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー制約
            $table->foreign('contract_line_id', 'fk_monthly_payment_histories_contract_lines')->references('id')->on('contract_lines');
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
