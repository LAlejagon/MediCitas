<?php

namespace App\Http\Controllers;

use App\Models\DoctorInfo;
use App\Models\User;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\DoctorInfoResource;
use App\Http\Resources\SpecialtyResource;
use App\Http\Resources\UserResource;

class DoctorInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorsInfo = DoctorInfo::with('specialty')->get(); // Obtiene todos los registros
        return response()->json(DoctorInfoResource::collection($doctorsInfo)); // Solo devuelve los datos
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id', // Verifica que el usuario existe
            'consultorio' => 'required|string|max:255',
            'especialidad_id' => 'required|exists:especialidades,especialidad_id',
        ]);

        $doctorInfo = DoctorInfo::create($validatedData);

        return response()->json([
            'message' => 'Doctor created successfully',
            'data' => $doctorInfo,
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctorInfo = DoctorInfo::findOrFail($id);
        $user = User::findOrFail($doctorInfo->user_id);
        $consultory = $doctorInfo->consultorio;
        $specialty = Specialty::findOrFail($doctorInfo->especialidad_id);

        return response()->json([
            'user_id' => new UserResource($user),
            'consultory' => $consultory,
            'specialty' => new SpecialtyResource($specialty),
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $doctorInfo = DoctorInfo::findOrFail($id);

            $validated = $request->validate([
                'consultorio' => 'required|string|max:255',
                'especialidad_id' => 'required|integer|exists:especialidades,especialidad_id',
            ]);

            $doctorInfo->update($validated);

            return new DoctorInfoResource($doctorInfo); // Usar el recurso para la respuesta del doctor actualizado
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar la información del doctor',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $doctorInfo = DoctorInfo::findOrFail($id);
            $doctorInfo->delete();

            return response()->json(['message' => 'Doctor eliminado exitosamente'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la información del doctor',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
