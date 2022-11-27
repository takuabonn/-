<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDetailsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_details_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable(false)->comment('UUID');
            $table->unsignedBigInteger('contract_detail_id')->nullable(false)->comment('契約内容ID');
            $table->integer('how_to_payment')->nullable(false)->comment('支払い方法');
            $table->integer('billing_deadline_type')->nullable(false)->comment('請求締め日種別');
            $table->integer('rate_plan_type')->nullable(false)->comment('料金プラン種別');
            $table->integer('family_discount_condition')->comment('家族割適用状況');
            $table->integer('wifi_discount_condition')->comment('光割引適用状況');
            $table->integer('call_option')->comment('通話オプション');
            $table->date('operation_start_at')->comment('適用開始日');
            $table->date('operation_end_at')->comment('適用終了日');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー
            $table->foreign('contract_detail_id', 'fk_contract_detail_id_contract_detail_histories')->references('id')->on('contract_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_details_histories');
    }
}
