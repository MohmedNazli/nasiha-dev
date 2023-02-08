<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => Company::all()->random()->id,
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => fake()->phoneNumber(),
            'password' => fake()->password(),
            'image' => fake()->imageUrl(),
            'isActive' => fake()->boolean,
            'job_title' => fake()->jobTitle(),
        ];
    }
}
