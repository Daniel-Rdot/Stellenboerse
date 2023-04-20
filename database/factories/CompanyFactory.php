<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Provider\Address;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::query()->inRandomOrder()->first();

        return [
            'user_id' => $user->id,

            'name' => fake()->company(),

            'email' => $user->email,
            'website' => fake()->url(),

            'street' => fake()->streetName(),
            'postcode' => Address::postcode(),
            'city' => fake()->city(),
        ];
    }
}
