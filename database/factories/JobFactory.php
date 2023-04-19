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
        $company = Company::all()->random();

        return [
            'company_id' => $company->id,
            'title' => fake()->sentence(),
            'location' => $company->location,
            'email' => $company->email,
            'website'=> $company->website,
            'description' => fake()->paragraph(5),
        ];
    }
}
