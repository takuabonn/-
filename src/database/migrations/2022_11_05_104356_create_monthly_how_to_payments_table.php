<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyHowToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_how_to_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_line_id')->nullable(false)->comment('契約回線ID');
            $table->integer('payment_type')->comment('支払い種別(0: 請求書,1: 銀行振替,2: クレジット)');
            $table->integer('billing_dead_line_type')->comment('請求締め日種別(0: 10日締め,1: 20日締め,2: 末締め)');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー制約
            $table->foreign('contract_line_id', 'fk_monthly_how_to_payments_contract_lines')->references('id')->on('contract_lines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_how_to_payments');
    }
}
