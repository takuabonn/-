<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoContractDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_contract_devices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable(false)->comment('UUID');
            $table->unsignedBigInteger('contractor_id')->comment('契約者ID');
            $table->string('device_name')->nullable(false)->comment('端末名');
            $table->integer('device_type')->comment('端末種別');
            $table->string('ime_number')->unique()->comment('IMEI番号');
            $table->integer('model_body_price')->nullable(false)->comment('本体金額');
            $table->integer('how_to_buy')->nullable(false)->comment('購入方法');
            $table->integer('division_number')->comment('分割回数');
            $table->integer('model_price_balance')->comment('端末代金残高');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー
            $table->foreign('contractor_id', 'fk_contractor_id_no_contract_devices')->references('id')->on('contractors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('no_contract_devices');
    }
}
