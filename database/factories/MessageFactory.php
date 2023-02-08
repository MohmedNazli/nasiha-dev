<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Message>
 */
class MessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sender_id' => Account::all()->random()->id,
            'receiver_id' => Account::all()->random()->id,
            'content' => fake()->realText(),
            'isRead' => fake()->boolean,
        ];
    }
}
