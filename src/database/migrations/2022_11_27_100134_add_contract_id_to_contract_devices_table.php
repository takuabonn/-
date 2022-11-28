<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractIdToContractDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_devices', function (Blueprint $table) {
            $table->unsignedBigInteger('contractor_id')->nullable()->after('uuid')->comment('契約者ID');

            // 外部キー
            $table->foreign('contractor_id', 'fk_contractor_id_contract_devices')->references('id')->on('contractors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contract_devices', function (Blueprint $table) {
            $table->dropForeign('fk_contractor_id_contract_devices');
            $table->dropColumn('contractor_id');
        });
    }
}
