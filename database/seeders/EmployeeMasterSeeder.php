<?php

namespace Database\Seeders;

use App\Models\Employee\EmployeeMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeMasterSeeder extends Seeder
{
     
    public function run()
    {
        EmployeeMaster::factory(10)->create();
    }
}
