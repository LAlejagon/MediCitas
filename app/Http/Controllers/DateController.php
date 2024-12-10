<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\User;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = Date::all(); // Obtener todas las citas (dates)
        return view('date.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $doctorsInfo = DoctorInfo::all();

        return view('modules/dates/create', compact('users', 'doctorsInfo')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
        // Validación de los datos recibidos
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'cedula_usuario' => 'required|integer|exists:users,id', // Verifica que el usuario existe
            'doctor_id' => 'required|integer|exists:doctorinfo,user_id', // Verifica que el doctor existe
            'razon' => 'nullable|string|max:255', // Razón es opcional
        ]);

        // Creación de una nueva cita
        $cita = new Date();
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->cedula_usuario = $request->cedula_usuario;
        $cita->doctor_id = $request->doctor_id;
        $cita->razon = $request->razon;
        $cita->lugar = "no se";
        $cita->direccion = "tampoco se";

        // Guardar la cita en la base de datos
        $cita->save();

        // Redirigir a la ruta de índice con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Cita creada exitosamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctorInfo = DoctorInfo::findOrFail($id);
        $user = User::findOrFail($doctorInfo->user_id);

        return view('modules/doctorsInfo/show', compact('doctorInfo', 'user', 'specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctorInfo = DoctorInfo::findOrFail($id);
        
        return view('modules/doctorsInfo/edit', compact('doctorInfo', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctorInfo = DoctorInfo::findOrFail($id); 
        $doctorInfo->consultorio = $request->consultorio;
        $doctorInfo->especialidad_id = $request->especialidad_id;
        $doctorInfo->save();
        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctorInfo = DoctorInfo::find($id);
        $doctorInfo->delete();
        return to_route('index');
    }
}
