<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractLinesAndFamilyGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_lines', function (Blueprint $table) {
            $table->foreign('contractor_id', 'fk_contractor_id_contract_lines')->references('id')->on('contractors');
            $table->foreign('family_group_id', 'fk_family_groupp_id_contract_lines')->references('id')->on('family_groups');
        });

        Schema::table('family_groups', function (Blueprint $table) {
            $table->foreign('contract_line_id', 'fk_contract_line_id_family_groups')->references('id')->on('contract_lines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
