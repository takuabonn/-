<?php

namespace Database\Factories;

use App\Models\ContractLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FamilyGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'contract_line_id' => function () {
                return ContractLine::factory()->create()->id;
            }
        ];
    }
}
