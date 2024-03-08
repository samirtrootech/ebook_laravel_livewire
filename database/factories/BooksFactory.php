<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'image'=>"https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg",
            'cover'=>"https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg",
            'price'=>45.55
        ];
    }
}
