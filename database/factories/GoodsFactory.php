<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goods>
 */
class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$aliases = [
						'butterfly', 'fei-ying', 'fifth-element', 'ivan-vasilievich', 'leon', 'lock-stock', 'manhattan-melodrama', 'rush-hour', 'rush-hour-2', 'scary-movie',
						'scary-movie-2', 'schindler-list', 'snatch', 'spartak', 'this-war', 'who-am-i'
					];

        return [
			'title' => $this->faker->unique()->text(mt_rand(10, 15)),
			'genre_id' => mt_rand(1, 5),
			'price' => mt_rand(100, 10000),
			'description' => $this->faker->realText(mt_rand(15, 300)),
			'year' => mt_rand(1900, 2025),
			'country' => $this->faker->country,
			'director' => $this->faker->text(mt_rand(5, 30)),
			'duration' => function () {
				$hours = mt_rand(0, 5);
				$minutes = mt_rand(0, 59);
				return ($hours > 0 ? $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ' : '')
					 . ($minutes > 0 ? $minutes . ' minute' . ($minutes > 1 ? '' : 's') : '');
			},
			'starring' => $this->faker->text(mt_rand(7, 300)),
			'alias' => $this->faker->unique()->randomElement($aliases),
        ];
    }
}
