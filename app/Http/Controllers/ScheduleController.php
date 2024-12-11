<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Date;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\DoctorInfoResource;
use App\Http\Resources\DateResource;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los horarios del usuario autenticado
        $schedules = Schedule::where('user_id', Auth::id())->paginate(5);
        return ScheduleResource::collection($schedules); // Usar el recurso para la colección
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cita_id' => 'required|integer|exists:dates,cita_id',
            'fecha' => 'required|date',
        ]);

        // Crear un nuevo horario para el usuario autenticado
        $schedule = new Schedule([
            'user_id' => Auth::id(),
            'cita_id' => $validatedData['cita_id'],
            'fecha' => $validatedData['fecha'],
        ]);

        $schedule->save();

        return response()->json(new ScheduleResource($schedule), 201); // Usar el recurso para la respuesta del horario creado
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        // Obtener el horario de un usuario específico
        $schedule = Schedule::where('user_id', $user_id)->firstOrFail();

        $user = DoctorInfo::findOrFail($schedule->user_id);
        $date = Date::findOrFail($schedule->cita_id);

        return response()->json([
            'schedule' => new ScheduleResource($schedule),
            'user' => new DoctorInfoResource($user),
            'date' => new DateResource($date),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        $schedule = Schedule::where('user_id', $user_id)->firstOrFail();

        $validatedData = $request->validate([
            'cita_id' => 'required|integer|exists:dates,cita_id',
            'fecha' => 'required|date',
        ]);

        $schedule->update($validatedData);

        return new ScheduleResource($schedule); // Usar el recurso para la respuesta del horario actualizado
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        $schedule = Schedule::where('user_id', $user_id)->firstOrFail();

        $schedule->delete();

        return response()->json(['message' => 'Horario eliminado exitosamente.'], 200); // Retorno estándar de éxito
    }
}
