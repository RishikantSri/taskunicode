<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'salary_month',
        'basic_pay',
        'grade_pay',
        'hra',
        'ta',
        'da',
        'disbursed_on',
    ];
}
