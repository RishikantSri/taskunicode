<?php

namespace Database\Factories\Employee;

use App\Models\Employee\EmployeeMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee\EmployeeMaster>
 */
class EmployeeMasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
  

    protected $model = EmployeeMaster::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'dob' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email' => $this->faker->unique()->safeEmail,
            'aadhaar_number' => $this->faker->unique()->numerify('############'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
