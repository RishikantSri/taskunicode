<?php

namespace Database\Factories\Employee;

use App\Models\Employee\EmployeeSalary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee\EmployeeSalary>
 */
class EmployeeSalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   

    protected $model = EmployeeSalary::class;

    public function definition(): array
    {
        return [
            'employee_id' => \App\Models\Employee\EmployeeMaster::factory(),
            'salary_month' => $this->faker->numberBetween(1, 12),
            'basic_pay' => $this->faker->numberBetween(30000, 80000),
            'grade_pay' => $this->faker->numberBetween(10000, 20000),
            'hra' => $this->faker->numberBetween(5000, 15000),
            'ta' => $this->faker->numberBetween(2000, 8000),
            'da' => $this->faker->numberBetween(3000, 10000),
            'disbursed_on' => $this->faker->date(),
        ];
    }
}
