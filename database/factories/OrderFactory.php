<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_id' => Str::random(26),
			'customer_name' => $this->faker->text(mt_rand(5, 30)),
			'customer_email' => fake()->unique()->safeEmail(),
			'customer_phone' => $this->faker->phoneNumber,
			'delivery_type' => $this->faker->text(mt_rand(5, 30)),
			'address' => $this->faker->text(mt_rand(7, 200)),
			'note' => $this->faker->text(mt_rand(5, 300)),
        ];
    }
}
