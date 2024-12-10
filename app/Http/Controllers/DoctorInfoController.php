<?php

namespace App\Http\Controllers;

use App\Models\DoctorInfo;
use App\Models\User;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DoctorInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorsInfo = DoctorInfo::with('specialty')->paginate(5); // Asegúrate de que la relación esté definida en el modelo
        return view('modules/index', compact('doctorsInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $specialties = Specialty::all();

        return view('modules/doctorsInfo/create', compact('users', 'specialties')); // Pass both to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|exists:users,id', // Cambiado a exists para verificar que el usuario existe
            'consultorio' => 'required|string',
            'especialidad_id' => 'required|integer|exists:especialidades,especialidad_id', // Verifica que la especialidad existe
        ]);

        $doctorInfo = new DoctorInfo();
        $doctorInfo->user_id = $request->user_id;
        $doctorInfo->consultorio = $request->consultorio;
        $doctorInfo->especialidad_id = $request->especialidad_id;

        $doctorInfo->save();

        return to_route('index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $doctorInfo = DoctorInfo::findOrFail($id);
        $user = User::findOrFail($doctorInfo->user_id);
        $specialty = Specialty::findOrFail($doctorInfo->especialidad_id);

        return view('modules/doctorsInfo/show', compact('doctorInfo', 'user', 'specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctorInfo = DoctorInfo::findOrFail($id);
        $specialties = Specialty::all();
        
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
