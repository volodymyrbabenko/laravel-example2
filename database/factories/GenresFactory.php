<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genres>
 */
class GenresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$titles = [
				'Action', 'Comedy', 'Drama', 'Horror', 'Science Fiction'
			];

        return [
			'title' => $this->faker->unique()->randomElement($titles),
        ];
    }
}
