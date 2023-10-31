<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name'=>$this->faker->sentence(2),
            'username'=>$this->faker->name(),
            'address'=>$this->faker->address(),
            'telephone'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->safeEmail(),
            'password'=>$this->faker->password(4,8),
            'role_id'=>$this->faker->numberBetween(1,9),
        ];
    }
}
