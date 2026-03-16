<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => mt_rand(1, 20),
            'product_id' => mt_rand(1, 20),
			'quantity' => mt_rand(1, 5),
			'price' => mt_rand(100, 10000),
        ];
    }
}
