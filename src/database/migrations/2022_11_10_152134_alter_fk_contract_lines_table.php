<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFkContractLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_lines', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_detail_id')->after('phone_number')->nullable(false)->comment('契約内容ID');
            $table->integer('how_to_payment_type')->after('phone_number')->comment('支払い方法種別(0:請求書,1:口座振替,2:クレジット)');
            $table->integer('billing_deadline_type')->after('phone_number')->comment('請求締め日種別(0:10締め,1:20締め,3:末締め)');

            $table->foreign('contract_detail_id', 'fk_contract_details_contract_lines')->references('id')->on('contract_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contract_lines', function (Blueprint $table) {
            //
        });
    }
}
