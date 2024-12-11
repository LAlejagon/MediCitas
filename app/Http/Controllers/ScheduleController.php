<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Date;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all(); // Obtener todos los horarios
        return view('index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctorsInfo = DoctorInfo::all();
        $dates = Date::all(); // Asegúrate de que este modelo exista

        return view('modules/schedules/create', compact('doctorsInfo', 'dates')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id', 
            'cita_id' => 'required|integer|exists:dates,cita_id',
            'fecha' => 'required|date',
        ]);

        // Creación de un nuevo horario
        $schedule = new Schedule();
        $schedule->user_id = $request->user_id;
        $schedule->cita_id = $request->cita_id;
        $schedule->fecha = $request->fecha;

        $schedule->save();

        // Redirigir a la ruta de índice con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Horario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $schedule = Schedule::findOrFail($user_id);
        $user = DoctorInfo::findOrFail($schedule->user_id);
        $date = Date::findOrFail($schedule->cita_id);

        return view('modules/schedules/show', compact('schedule', 'user', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        $schedule = Schedule::findOrFail($user_id);
        $users = DoctorInfo::all();
        $dates = Date::all();

        return view('modules/schedules/edit', compact('schedule', 'users', 'dates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        $schedule = Schedule::findOrFail($user_id);

        $request->validate([
            'cita_id' => 'required|integer|exists:dates,cita_id',
            'fecha' => 'required|date',
        ]);

        $schedule->cita_id = $request->cita_id;
        $schedule->fecha = $request->fecha;

        $schedule->save();

        return redirect()->route('schedules.index')->with('success', 'Horario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        $schedule = Schedule::findOrFail($user_id);
        $schedule->delete();

        return redirect()->route('index')->with('success', 'Horario eliminado exitosamente.');
    }
}