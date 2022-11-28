<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoContractDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_details', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable(false)->comment('UUID');
            $table->unsignedBigInteger('contract_line_id')->nullable(false)->comment('契約回線ID');
            $table->integer('how_to_payment')->nullable(false)->comment('支払い方法');
            $table->integer('billing_deadline_type')->nullable(false)->comment('請求締め日種別');
            $table->integer('rate_plan_type')->nullable(false)->comment('料金プラン種別');
            $table->integer('family_discount_condition')->nullable()->comment('家族割適用状況');
            $table->integer('wifi_discount_condition')->nullable()->comment('光割引適用状況');
            $table->integer('call_option')->nullable()->comment('通話オプション');
            $table->timestamps();
            $table->softDeletes();

            // 外部キー
            $table->foreign('contract_line_id', 'fk_contract_line_id_contract_details')->references('id')->on('contract_lines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('no_contract_details');
    }
}
