<?php

namespace App\Http\Controllers;

use App\Models\Date; // Asegúrate de tener el modelo Cita
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\DateResource; // Asegúrate de tener un recurso para Cita
use App\Http\Resources\DoctorInfoResource;
use App\Http\Resources\UserResource;
use App\Models\DoctorInfo;
use App\Models\User;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Date::with('user', 'doctor')->paginate(5);
        return DateResource::collection($citas); // Usar el recurso para la colección de citas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Establecer el encabezado 'Accept' como 'application/json' para esta solicitud
        $request->headers->set('Accept', 'application/json');

        $validated = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'cedula_usuario' => 'required|string|max:255',
            'doctor_id' => 'required|string|max:255|exists:doctorinfo,user_id',
            'lugar' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'razon' => 'nullable|string|max:500',
        ]);

        $cita = Date::create([
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'cedula_usuario' => $validated['cedula_usuario'],
            'doctor_id' => $validated['doctor_id'],
            'lugar' => $validated['lugar'],
            'direccion' => $validated['direccion'],
            'razon' => $validated['razon'],
        ]);

        return response()->json(new DateResource($cita), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cita = Date::findOrFail($id);
        return new DateResource($cita); // Usar el recurso para la respuesta de la cita
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cita = Date::findOrFail($id);

            $validated = $request->validate([
                'fecha' => 'required|date',
                'hora' => 'required|date_format:H:i',
                'cedula_usuario' => 'required|string|max:255',
                'doctor_id' => 'required|string|max:255|exists:doctorinfo,user_id',
                'lugar' => 'required|string|max:255',
                'direccion' => 'required|string|max:255',
                'razon' => 'nullable|string|max:500',
            ]);

            $cita->update($validated);

            $user = User::findOrFail($cita->cedula_usuario);
            $doctor = DoctorInfo::findOrFail($cita->doctor_id);

            return response()->json([
                'user_id' => new UserResource($user),
                'doctor_id' => new DoctorInfoResource($doctor),
                'fecha' => $cita->fecha,
                'hora' => $cita->hora,
                'lugar' => $cita->lugar,
                'direccion' => $cita->direccion,
                'razon' => $cita->razon,
            ], Response::HTTP_OK);
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