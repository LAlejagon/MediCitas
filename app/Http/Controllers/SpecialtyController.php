<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialty::paginate(5);
        return response()->json(SpecialtyResource::collection($specialties)); // Usar el recurso para la colección
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'especialidad_id' => 'required|integer|unique:specialties,especialidad_id',
            'nombre' => 'required|string|max:255',
        ]);

        $specialty = new Specialty($validatedData);
        $specialty->save();

        return response()->json(new SpecialtyResource($specialty), 201); // Retornar la especialidad creada
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $specialty = Specialty::where('especialidad_id', $id)->first();

        if (!$specialty) {
            return response()->json(['message' => 'Specialty not found'], 404);
        }

        return new SpecialtyResource($specialty); // Usar el recurso para la respuesta de la especialidad
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $specialty = Specialty::where('especialidad_id', $id)->first();

        if (!$specialty) {
            return response()->json(['message' => 'Specialty not found'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $specialty->update($validatedData);

        return new SpecialtyResource($specialty); // Usar el recurso para la respuesta de la especialidad actualizada
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialty = Specialty::where('especialidad_id', $id)->first();

        if (!$specialty) {
            return response()->json(['message' => 'Specialty not found'], 404);
        }

        $specialty->delete();

        return response()->json(['message' => 'Specialty deleted successfully'], 200); // Retorno estándar de éxito
    }
}
