<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('contractors')->truncate();
        DB::table('contract_lines')->truncate();
        DB::table('family_groups')->truncate();
        DB::table('contract_devices')->truncate();
        Schema::enableForeignKeyConstraints();
        $this->call([
            ContractorSeeder::class,
            ContractLineSeeder::class,
        ]);
    }
}
