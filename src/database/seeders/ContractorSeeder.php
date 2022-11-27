<?php

namespace Database\Seeders;

use App\Models\Contractor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Contractor::factory()->count(10)->create();
    }
}
