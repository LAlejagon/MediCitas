<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

        public function rules(): array
        {
            return [
                "id" => "required|unique|numeric|min:1", 
                "name" => "required|unique:users,name|alpha_dash|min:3|max:255",
                "email" => "required|email|unique:users,email|max:255",
                "password" => "required|min:8|max:16", 
                "address" => "required|string|max:255",
                "gender" => "required|in:male,female,other",
                "age" => "required|integer|min:0|max:120",
                "health_history" => "nullable|string|max:500", 
                "user_type" => "required|in:admin,user,doctor", 
            ];
        }

}
