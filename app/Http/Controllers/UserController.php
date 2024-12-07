<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::paginate(5);
        return view('modules/users/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules/users/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|unique:users,id', // Validar que el ID sea único
            'name' => 'required|string',
            // Agrega validaciones para otros campos según sea necesario
        ]);

        $item = new User();
        $item->id = $request->id; // Asignar el valor de la cédula al campo 'id'
        $item->name = $request->name;
        $item->email = $request->email; // Asegúrate de que el formulario tenga un campo para el email
        $item->address = $request->address; // Asegúrate de que el formulario tenga un campo para la dirección
        $item->gender = $request->gender; // Asegúrate de que el formulario tenga un campo para el género
        $item->age = $request->age; // Asegúrate de que el formulario tenga un campo para la edad
        $item->password = bcrypt($request->password); // Asegúrate de que el formulario tenga un campo para la contraseña
        $item->health_history = $request->health_history; // Asegúrate de que el formulario tenga un campo para el historial de salud
        $item->user_type = $request->user_type; // Asegúrate de que el formulario tenga un campo para el tipo de usuario
        $item->save();

        return to_route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = User::find($id);
        return view('modules/users/show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::find($id);
        return view('modules.users.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = User::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->address = $request->address;
        $item->gender = $request->gender;
        $item->age = $request->age;
        $item->user_type = $request->user_type;
        $item->save();
        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
