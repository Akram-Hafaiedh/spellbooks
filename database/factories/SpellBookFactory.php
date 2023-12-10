<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpellBook>
 */
class SpellBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_name' => fake()->file('storage/app/public','spellbooks','true'),
            'file_path' => fake()->url(),
            'content' => fake()->paragraph(),
        ];
    }
}
