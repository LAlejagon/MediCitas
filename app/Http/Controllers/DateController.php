<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\User;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\DateResource; // Importa el recurso DateResource

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = Date::all();
        return DateResource::collection($dates); // Usar el recurso para la colección de citas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'cedula_usuario' => 'required|integer|exists:users,id', // Validar que el usuario exista
            'doctor_id' => 'required|integer|exists:doctorinfo,user_id', // Validar que el doctor exista
            'razon' => 'nullable|string|max:255',
        ]);

        try {
            $cita = Date::create([
                'fecha' => $validatedData['fecha'],
                'hora' => $validatedData['hora'],
                'cedula_usuario' => $validatedData['cedula_usuario'],
                'doctor_id' => $validatedData['doctor_id'],
                'razon' => $validatedData['razon'] ?? null,
                'lugar' => 'no se', // Definir un lugar por defecto o manejarlo según la lógica del negocio
                'direccion' => 'tampoco se',
            ]);

            return new DateResource($cita); // Usar el recurso para la respuesta de la cita creada
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la cita',
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
            $cita = Date::findOrFail($id);
            $user = User::findOrFail($cita->cedula_usuario);
            $doctorInfo = DoctorInfo::findOrFail($cita->doctor_id);

            return response()->json([
                'cita' => new DateResource($cita),
                'user' => new UserResource($user),
                'doctorInfo' => new DoctorInfoResource($doctorInfo),
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Cita no encontrada',
                'message' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cita = Date::findOrFail($id);

        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'cedula_usuario' => 'required|integer|exists:users,id',
            'doctor_id' => 'required|integer|exists:doctorinfo,user_id',
            'razon' => 'nullable|string|max:255',
        ]);

        try {
            $cita->update($validatedData);

            return new DateResource($cita); // Usar el recurso para la respuesta de la cita actualizada
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar la cita',
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
            $cita = Date::findOrFail($id);
            $cita->delete();

            return response()->json(['message' => 'Cita eliminada exitosamente'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la cita',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
