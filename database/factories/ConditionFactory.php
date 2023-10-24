<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class ConditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisOptions = ['baik', 'buruk', 'medium'];
        $currentIndex = session('jenis_index', 0);
        $jenisValue = $jenisOptions[$currentIndex];
        $currentIndex = ($currentIndex + 1) % count($jenisOptions);

        // Store the updated index in the session.
        session(['jenis_index' => $currentIndex]);

        return [
            'kondisi' => $jenisValue,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
