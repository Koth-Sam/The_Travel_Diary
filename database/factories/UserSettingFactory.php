<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSetting>
 */
class UserSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'display_name' => fake()->firstName(),
            'notification_preference' => fake()->boolean,
            'user_id' => fake()->numberBetween(2,10),
            'theme' => fake()->randomElement(['Theme 1', 'Theme 2', 'Theme 3']),
        ];
    }
}
