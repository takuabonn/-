<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMonthlyPaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_payment_histories', function (Blueprint $table) {
            $table->dropForeign('fk_monthly_payment_histories_contract_lines');
            $table->unsignedBigInteger('contract_device_id')->nullable(false)->after('uuid')->comment('契約端末ID');
            
            // 外部キー制約
            $table->foreign('contract_device_id', 'fk_monthly_payment_histories_contract_devices')->references('id')->on('contract_devices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_payment_histories', function (Blueprint $table) {
            $table->dropForeign('fk_monthly_payment_histories_contract_devices');
            $table->dropColumn('contract_device_id');
            $table->unsignedBigInteger('contract_line_id')->nullable(false)->after('id')->comment('契約回線ID');
            $table->foreign('contract_line_id', 'fk_monthly_payment_histories_contract_lines')->references('id')->on('contract_lines');
        });
    }
}
