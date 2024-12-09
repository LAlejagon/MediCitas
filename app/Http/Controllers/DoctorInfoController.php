<?php

namespace App\Http\Controllers;

use App\Models\DoctorInfo;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DoctorInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorInfo = DoctorInfo::paginate(5);
        return view('modules/index', compact('doctorsInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $specialties = Specialty::all(); // Obtener todas las especialidades
    return view('modules/doctorsInfo/create', compact('specialties'));
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
        $doctorInfo = DoctorInfo::find($id);
        return view('modules/doctorsInfo/show', compact('doctorInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctorInfo = DoctorInfo::find($id);
        return view('modules/doctorsInfo/edit', compact('doctorInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctorInfo = DoctorInfo::find($id);
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
