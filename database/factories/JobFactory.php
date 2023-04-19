<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => rand(1, Company::all()->count()),
            'title' => fake()->sentence(),
            'location' => fake()->city(),
            'email' => fake()->companyEmail(),
            'website'=> fake()->url(),
            'description' => fake()->paragraph(5),
        ];
    }
}
