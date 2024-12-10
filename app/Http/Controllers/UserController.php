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
        $users = User::paginate(5);
        return view('modules/index', compact('users'));
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

        $user = new User();
        $user->id = $request->id; // Asignar el valor de la cédula al campo 'id'
        $user->name = $request->name;
        $user->email = $request->email; // Asegúrate de que el formulario tenga un campo para el email
        $user->address = $request->address; // Asegúrate de que el formulario tenga un campo para la dirección
        $user->gender = $request->gender; // Asegúrate de que el formulario tenga un campo para el género
        $user->age = $request->age; // Asegúrate de que el formulario tenga un campo para la edad
        $user->password = bcrypt($request->password); // Asegúrate de que el formulario tenga un campo para la contraseña
        $user->health_history = $request->health_history; // Asegúrate de que el formulario tenga un campo para el historial de salud
        $user->user_type = $request->user_type; // Asegúrate de que el formulario tenga un campo para el tipo de usuario
        $user->save();

        return to_route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('modules/users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('modules.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->user_type = $request->user_type;
        $user->save();
        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return to_route('index');
    }
}
