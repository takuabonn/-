<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterContractLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_lines', function (Blueprint $table) {
            $table->dropForeign('fk_contract_lines_contractors');
            $table->dropColumn('ime_number');
            $table->dropColumn('model_body_price');
            $table->dropColumn('contract_status');

        });
        Schema::table('contract_lines', function (Blueprint $table) {
            $table->integer('contract_status')->default(1)->comment('契約ステータス(契約中:1,契約終了:0)');

            $table->string('phone_number',11)->nullable(false)->unique()->after('contractor_id')->comment('電話番号');
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
        Schema::table('contract_lines', function (Blueprint $table) {
            $table->dropForeign('fk_contract_lines_contractors');
            $table->integer('ime_number',false, true)->unique()->comment('IMEI番号');
            $table->integer('model_body_price', false, true)->comment('本体価格');
            $table->dropColumn('contract_status');
            $table->string('contract_status', 0)->default('1')->comment('契約ステータス(契約中:1,契約終了:0)');
            $table->dropColumn('phone_number');
            $table->foreign('contractor_id', 'fk_contract_lines_contractors')->references('id')->on('contractors');
        });
    }
}
