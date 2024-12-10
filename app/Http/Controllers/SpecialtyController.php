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
        return view('modules/index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules/specialties/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'especialidad_id' => 'required|integer|unique:especialidades,especialidad_id', 
            'nombre' => 'required|string|max:255', 
        ]);

        $specialty = new Specialty();
        $specialty->especialidad_id = $request->especialidad_id; 
        $specialty->nombre = $request->nombre; 
        $specialty->save();

        return to_route('index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $specialty = Specialty::where('especialidad_id', $id)->firstOrFail();
        return view('modules/specialties/show', compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specialty = Specialty::where('especialidad_id', $id)->firstOrFail();
        return view('modules/specialties/edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $specialty = Specialty::where('especialidad_id', $id)->firstOrFail();

        $specialty->nombre = $request->nombre;
        $specialty->save();

        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();
        return to_route('index');
    }
}