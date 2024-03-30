<?php

namespace Database\Seeders;

use App\Models\Employee\EmployeeSalary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSalarySeeder extends Seeder
{
   
    public function run() : void
    {
        EmployeeSalary::factory(10)->create();
    }
}
