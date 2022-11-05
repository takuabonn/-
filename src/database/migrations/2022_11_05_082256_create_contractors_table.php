<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();
            // entityの識別子
            $table->uuid('uuid')->nullable(false)->unique();
            $table->string('name', 255)->nullable(false)->comment('契約者名');
            $table->string('zip_code', 30)->nullable(false)->comment('郵便番号');
            $table->string('prefecture', 10)->nullable(false)->comment('都道府県');
            $table->string('city', '30')->nullable(false)->comment('市町村区');
            $table->string('street_bunch', '30')->commment('町名番地');
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
        Schema::dropIfExists('contractors');
    }
}
