<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payer' => $this->faker->numberBetween(1, 5),
            'payee' => $this->faker->numberBetween(6, 10),
            'value' => $this->faker->randomFloat(2, 20, 500)
        ];
    }
}
