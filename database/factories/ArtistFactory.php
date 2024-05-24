<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Artist::class;

    public function definition(): array
    {
        $name = fake()->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name, "-"),
            'profile_avatar' => fake()->imageUrl(),
        ];
    }
}
