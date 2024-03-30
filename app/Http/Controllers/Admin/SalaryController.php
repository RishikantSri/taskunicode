<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee\EmployeeMaster;
use App\Models\Employee\EmployeeSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SalaryController extends Controller
{
    //

    public function submit(Request $request)
    {

        // Validate request data
        $validatedData = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'email' => [
                'required',
                'email',
                'max:255',                
            ],
            'aadhaar_number' => [
                'required',
                'regex:/^\d{4}-\d{4}-\d{4}$/',                
            ],

        ]);


        if ($validatedData->fails()) {

            // return response()->json([
            //     'code' => 200,
            //     'status' => false,
            //     'message' => $validatedData->errors()->first(),
            //     'error' => 'Validation failed'
            // ], 422);

            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->toArray();
                $errorFields = array_keys($errors);
                return response()->json(['errors' => $errors, 'fields' => $errorFields], 422);
            }
        }

        $validatedData = $validatedData->getData();
        // Check if employee exists based on email or Aadhaar number
        $employee = EmployeeMaster::where('email', $validatedData['email'])
            ->orWhere('aadhaar_number', $validatedData['aadhaar_number'])
            ->first();
        
        $message = "";    

        if (!$employee) {
            // Case 2: Create a new employee
            $employee = EmployeeMaster::create([
                'name' => $validatedData['name'],
                'dob' => $validatedData['dob'],
                'gender' => $validatedData['gender'],
                'email' => $validatedData['email'],
                'aadhaar_number' => $validatedData['aadhaar_number'],
            ]);
            
            $message = "New Emp created and ";

        } else {

            // Case 3: Update employee info if necessary
            // Check if any information is new and update the EmployeeMaster table

            $updated = false;

            if ($employee->name != $validatedData['name']) {
                $employee->name = $validatedData['name'];
                $updated = true;


            }
            if ($employee->dob != $validatedData['dob']) {
                $employee->dob = $validatedData['dob'];
                $updated = true;
            }
            if ($employee->gender != $validatedData['gender']) {
                $employee->gender = $validatedData['gender'];
                $updated = true;
            }
            if ($employee->email != $validatedData['email']) {
                $employee->email = $validatedData['email'];
                $updated = true;
            }
            if ($employee->aadhaar_number != $validatedData['aadhaar_number']) {
                $employee->aadhaar_number = $validatedData['aadhaar_number'];
                $updated = true;
            }
            $employee->save();

            if($updated == true){

                $message = "Emp data updated and ";
            }

        }

        // Create salary entry
        $salary = EmployeeSalary::create([
            'employee_id' => $employee->id,
            'salary_month' => $validatedData['salary_month'],
            'basic_pay' => $validatedData['basic_pay'],
            'grade_pay' => $validatedData['grade_pay'],
            'hra' => $validatedData['hra'],
            'ta' => $validatedData['ta'],
            'da' => $validatedData['da'],
            'disbursed_on' => now(), // assuming salary is disbursed immediately
        ]);

        // Return response
        return response()->json(['message' => $message . 'Salary submitted successfully', 'salary' => $salary], 200);
    }
}
