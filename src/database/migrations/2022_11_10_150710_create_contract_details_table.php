<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDetailsTable extends Migration
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
            $table->uuid('uuid')->unique();
            $table->integer('plane_type')->nullable(false)->comment('プラン');
            $table->integer('family_discount_condition')->comment('家族割');
            $table->integer('wifi_discount_condition')->comment('光割引');
            $table->integer('call_option')->comment('通話オプション');
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
        Schema::dropIfExists('contract_details');
    }
}
