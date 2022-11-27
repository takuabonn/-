<?php

namespace Database\Factories;

use App\Models\Contractor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContractLineFactory extends Factory
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
            'phone_number' => $this->faker->phoneNumber(),
            'contractor_id' => function () {
                return Contractor::factory()->create()->id;
            },
            'family_group_id' => null,
        ];
    }
}
