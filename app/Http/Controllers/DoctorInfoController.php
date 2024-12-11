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
        try {
            $doctorsInfo = DoctorInfo::with('specialty')->paginate(5);
            return DoctorInfoResource::collection($doctorsInfo); // Usar el recurso para la colección de doctores
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener la lista de doctores',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'consultorio' => 'required|string|max:255',
            'especialidad_id' => 'required|integer|exists:especialidades,especialidad_id',
        ]);

        try {
            $doctorInfo = DoctorInfo::create([
                'user_id' => $validated['user_id'],
                'consultorio' => $validated['consultorio'],
                'especialidad_id' => $validated['especialidad_id'],
            ]);

            return response()->json(new DoctorInfoResource($doctorInfo), 201); // Usar el recurso para la respuesta del doctor creado
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la información del doctor',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $doctorInfo = DoctorInfo::findOrFail($id);
            $user = User::findOrFail($doctorInfo->user_id);
            $specialty = Specialty::findOrFail($doctorInfo->especialidad_id);

            return response()->json([
                'doctorInfo' => new DoctorInfoResource($doctorInfo),
                'user' => new UserResource($user),
                'specialty' => new SpecialtyResource($specialty),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Doctor no encontrado',
                'message' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
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
