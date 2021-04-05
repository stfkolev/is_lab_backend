<?php

namespace Database\Factories;

use App\Models\Reader;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReaderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reader::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName'     => $this->faker->firstName,
            'lastName'      => $this->faker->lastName,
            'address'       => $this->faker->streetName,
            'UCN'           => $this->faker->numberBetween(1000000000, 9999999999),
            'work'          => $this->faker->jobTitle,
        ];
    }
}
