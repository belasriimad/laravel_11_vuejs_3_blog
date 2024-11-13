<?php

namespace Database\Factories;

use Faker\Core\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word().str()->random(2);
        return [
            //
            'name_en' => $name.'_en',
            'name_fr' => $name.'_fr',
            'slug' => Str::slug($name),
        ];
    }
}
