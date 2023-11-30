<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domaine>
 */
class DomaineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->domainName,
            'proprietaire' => $this->faker->name,
            'date_dachat' => $this->faker->date,
            'date_expiration' => $this->faker->date,
            'hebergeur_id' => $this->faker->numberBetween(1, 10),
            'plan_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
