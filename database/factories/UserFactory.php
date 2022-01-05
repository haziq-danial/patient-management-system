<?php

namespace Database\Factories;

use App\Classes\Constants\RoleType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role_type' => $this->faker->numberBetween($min = 1, $max = 3),
            'tel_no' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::ADMIN
            ];
        });
    }

    public function medical()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::MEDICAL
            ];
        });
    }

    public function technician()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::TECHNICIAN
            ];
        });
    }
}
