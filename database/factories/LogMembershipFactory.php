<?php

namespace Database\Factories;

use App\Models\GymPackage;
use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LogMembership>
 */
class LogMembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'membership_id'  => Membership::factory(),
            'gym_package_id' => GymPackage::factory(),
            'start_date'     => $this->faker->dateTimeBetween('-1 year', 'now'),
            'end_date'       => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
