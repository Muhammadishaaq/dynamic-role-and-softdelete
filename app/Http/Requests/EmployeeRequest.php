<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required', 
            'password' => 'required', 
            'phone_number' => 'required', 
            'role' => 'required', 
            'position' => 'required', 
            'department' => 'required', 
            'joining_date' => 'required', 
            'dob' => 'nullable', 
            'salary' => 'nullable', 
            'address' => 'nullable', 
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The employee name is required.',
            'email.required' => 'The email is required.',
            'email.unique' => 'This email is already taken.',
            'password.min' => 'Password should be at least 6 characters.',
            'phone_number.required' => 'Phone number is required.',
            'role.required' => 'Role is required.',
            'role.in' => 'Role must be either Employee or Hr.',
            'position.required' => 'Position is required.',
            'department.required' => 'Department is required.',
            'joining_date.required' => 'Joining date is required.',
            'joining_date.date' => 'Joining date must be a valid date.',
            'dob.before' => 'Date of birth must be before today.',
            'salary.numeric' => 'Salary must be a valid number.',
        ];
    }
}
