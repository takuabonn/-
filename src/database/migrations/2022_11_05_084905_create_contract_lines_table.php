<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_lines', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('contractor_id')->nullable(false)->comment('契約者ID');
            $table->string('contract_status', 0)->default('1')->comment('契約ステータス(契約中:1,契約終了:0)');
            $table->integer('ime_number',false, true)->unique()->comment('IMEI番号');
            $table->integer('model_body_price', false, true)->comment('本体価格');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー制約
            $table->foreign('contractor_id', 'fk_contract_lines_contractors')->references('id')->on('contractors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_lines');
    }
}
