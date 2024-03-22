<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileRequest extends FormRequest
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
    
        return [
            "name" => "required|string|min:2",
            "last_name" => "required|string|min:3",
            "email" => "required|email",
            "phone" => "required|numeric|digits:11",
            "company" => "nullable|string",
            "address" => "nullable|string",
            "city" => "nullable|string",
            "country" => "nullable|string",
            "avatar" => "nullable|sometimes|image|mimes:jpeg,png,jpg|max:1024",
            "hire_date" => "nullable|date",
            "date_of_birth" => "nullable|date",
            "employee_status" => ['nullable', Rule::in(User::$EMPLOYEESTATUS)],
            "department_id" => "nullable|numeric",
            "job_title" => "nullable|string"
        ];
    }
}
