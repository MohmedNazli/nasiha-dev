<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_name' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => fake()->phoneNumber(),
            'password' => fake()->password(),
            'image' => fake()->imageUrl(),
            'isActive' => fake()->boolean,
            'settings' => '["color","red"]',
        ];
    }
}
