<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role' => 'user',
            'nis' => mt_rand(123456789, 999999999),
            'name' => $this->faker->name(),
            'class' => Arr::random(['X' , 'XI' , 'XII']),
            'jurusan' => Arr::random(['RPL', 'TKJ', 'TKRO', 'TBSM', 'TO', 'AKUTANSI']),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */

}
