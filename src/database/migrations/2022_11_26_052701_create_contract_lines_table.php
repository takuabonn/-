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
            $table->uuid('uuid')->unique()->nullable(false)->comment('UUID');
            $table->string('phone_number')->nullable(false)->unique()->comment('電話番号');
            $table->unsignedBigInteger('contractor_id')->nullable(false)->comment('契約者ID');
            $table->unsignedBigInteger('family_group_id')->nullable(true)->comment('家族グループID');
            $table->integer('contract_status')->nullable(false)->default(1)->comment('契約ステータス(1:契約中,0:契約終了)');
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
        Schema::dropIfExists('contract_lines');
    }
}
