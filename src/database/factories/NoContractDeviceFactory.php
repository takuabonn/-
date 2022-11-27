<?php

namespace Database\Factories;

use App\Models\Contractor;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoContractDeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'device_name' => 'iphone',
            'contractor_id' => function () {
                return Contractor::factory()->create()->id;
            },
            'device_type' => 0,
            'ime_number' => $this->faker->randomNumber,
            'model_body_price' => 50000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_blance' => 50000,
        ];
    }
}
