<?php

namespace Database\Factories;

use App\Models\ContractLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContractDeviceFactory extends Factory
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
            'device_name' => 'iphone',
            'contract_line_id' => function () {
                return ContractLine::factory()->create()->id;
            },
            'device_type' => 0,
            'ime_number' => $this->faker->randomNumber,
            'model_body_price' => 50000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_balance' => 50000,
        ];
    }
}
