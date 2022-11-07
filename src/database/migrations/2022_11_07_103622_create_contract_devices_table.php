<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_devices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->comment('uuid');
            $table->unsignedBigInteger('contract_line_id')->nullable(false)->comment('契約回線ID');
            $table->string('device_name', 30)->nullable(false)->comment('端末名');
            $table->integer('imei_number')->unique()->nullable(false)->comment('IMEI番号');
            $table->integer('model_body_price')->nullable(false)->comment('本体価格');
            $table->integer('how_to_payment_type')->comment('支払い方法種別(0:請求書,1:口座振替,2:クレジット)');
            $table->integer('billing_deadline_type')->comment('請求締め日種別(0:10締め,1:20締め,3:末締め)');
            $table->integer('contract_status')->comment('契約ステータス');
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
        Schema::dropIfExists('contract_devices');
    }
}
