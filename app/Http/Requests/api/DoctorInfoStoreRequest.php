<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class DoctorInfoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambia esto según tu lógica de autorización
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "cedula_doctor" => "required|unique:detalles_doctor,cedula_doctor|numeric|min:1", 
            "consultorio" => "required|string|max:255",
            "especialidad_id" => "required|exists:especialidad,especialidad_id|numeric",
        ];
    }
}