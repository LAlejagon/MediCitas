<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),
        422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
            "name" => "required|alpha_dash|min:3|max:255|unique:users,name," . $this->id,
            "email" => "required|email|max:255|unique:users,email," . $this->id,
            "password" => "nullable|min:8|max:16",
            "address" => "nullable|string|max:255",
            "gender" => "nullable|in:male,female,other",
            "age" => "nullable|integer|min:0|max:120",
            "health_history" => "nullable|string|max:500", 
            "user_type" => "required|in:admin,user,doctor", 
        ];
        
    }
}
