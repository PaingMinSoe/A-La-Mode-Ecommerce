<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => 'steve.rogers@gmail.com',
//            'email_verified_at' => now(),
            'address' => $this->faker->address(),
            'nrc_number' => '12/LaMaTa(N)' . $this->faker->numerify('######'),
            'phone_number' => $this->faker->phoneNumber(),
            'gender' => 'male',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'profile_image' => 'avatar.jpg',
            'role' => 'admin'
//            'remember_token' => Str::random(10),
        ];
    }
}
