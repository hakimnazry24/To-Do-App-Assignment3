<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => "required|email",
            "password" => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/",
            "password_confirmation" => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/"
        ];
    }

    public function messages(){
        return [
            "name.required" => "Name is required",
            "email.required" => "Email is required",
            "email.email" => "Please enter valid email format",
            "password.required" => "Password is required",
            "password_confirm.required" => "Confirm password is required",
            "password.regex" => "Password must contain at least 1 uppercase letter, 1 lowercase letter, and be at least 8 characters",
            "password_confirmation.regex" => "Password must contain at least 1 uppercase letter, 1 lowercase letter, and be at least 8 characters"
        ];
    }
}
