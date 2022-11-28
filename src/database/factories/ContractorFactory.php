<?php

namespace Database\Factories;

use App\Models\Contractor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContractorFactory extends Factory
{
    protected $model = Contractor::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'name' => $this->faker->name,
            'zip_code' => $this->faker->postcode,
            'birth_day' => $this->faker->date('Y/m/d', '2030/04/01'),
            'prefecture' => $this->faker->prefecture,
            'city' => $this->faker->city,
            'street_bunch' => $this->faker->streetAddress,
        ];
    }
}
