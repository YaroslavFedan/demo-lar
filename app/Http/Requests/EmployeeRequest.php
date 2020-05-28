<?php

namespace App\Http\Requests;

use App\Employee;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'full_name'=>'required|max:256',
            'phone'=>'required|regex:/^\+[0-9]{3}\s\([0-9]{2}\)\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/',
            'email'=>'required|email|unique:employees,email',
            'position_id'=>'required|integer',
            'salary'=>['required', function ($attribute, $value, $fail) {
                if ($value > 500) {
                    $fail('Salary fractional number from 0 to 500.000');
                }
            }, 'regex:/^[0-9]{1,3}+(\.[0-9]{1,3})?$/' ],
            'photo'=>'file|image|mimes:jpg,jpeg,png|max:5000',
            'employed_at'=>'required|date_format:m.d.Y',
            'parent_id'=>'required|exists:employees,id'
        ];

        if($this->method() === "PATCH" ){
            $employee = Employee::findOrFail((int) request()->employee->id);
            $rules["email"] = ['required','email','unique:employees,email,'.$employee->id];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'phone.regex'=>'Required format +380 (XX) XXX XX XX',
            'parent_id.required'=>'There is no such person in the database',
            'parent_id.exists'=>'There is no such person in the database',
        ];
    }
}
