<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFkMonthlyPaymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('monthly_payment_histories', function (Blueprint $table) {
        //     $table->dropForeign('fk_monthly_payment_histories_contract_devices');
        //     $table->dropColumn('contract_device_id');
        // });

        // Schema::table('monthly_payment_histories', function (Blueprint $table) {
        //     $table->unsignedBigInteger('contract_line_id')->nullable(false)->after('id')->comment('契約回線ID');
        //     $table->foreign('contract_line_id', 'fk_monthly_payment_histories_contract_lines')->references('id')->on('contract_lines');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_payment_histories', function (Blueprint $table) {
            //
        });
    }
}
