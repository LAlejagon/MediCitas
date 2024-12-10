<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function index()
    {
        $dates = Date::all(); // Obtener todas las citas (dates)
        return view('date.index', compact('dates'));
    }

    public function create()
    {
        return view('date.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'cedula_usuario' => 'required|string',
            'doctor_id' => 'required|integer',
            'lugar' => 'required|string',
            'direccion' => 'required|string',
            'razon' => 'nullable|string',
        ]);

        Date::create($request->all());
        return redirect()->route('date.index')->with('success', 'Date created successfully.');
    }

    public function show(Date $date)
    {
        return view('date.show', compact('date'));
    }

    public function edit(Date $date)
    {
        return view('date.edit', compact('date'));
    }

    public function update(Request $request, Date $date)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'cedula_usuario' => 'required|string',
            'doctor_id' => 'required|integer',
            'lugar' => 'required|string',
            'direccion' => 'required|string',
            'razon' => 'nullable|string',
        ]);

        $date->update($request->all());
        return redirect()->route('date.index')->with('success', 'Date updated successfully.');
    }

    public function destroy(Date $date)
    {
        $date->delete();
        return redirect()->route('date.index')->with('success', 'Date deleted successfully.');
    }
}