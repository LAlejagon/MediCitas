<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource; // Importa el recurso UserResource

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return response()->json(UserResource::collection($users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Establecer el encabezado 'Accept' como 'application/json' para esta solicitud
        $request->headers->set('Accept', 'application/json');

        $validatedData = $request->validate([
            'id' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'age' => 'nullable|integer|min:0',
            'health_history' => 'nullable|string|max:500',
            'user_type' => 'required|string|max:50',
        ]);

        $user = User::create([
            'id' => $validatedData['id'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'age' => $validatedData['age'],
            'health_history' => $validatedData['health_history'],
            'user_type' => $validatedData['user_type'],
        ]);

        return response()->json(new UserResource($user), 201); // Respuesta JSON explícita con código de éxito
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return new UserResource($user); // Usar el recurso para la respuesta del usuario
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'age' => 'nullable|integer|min:0',
            'user_type' => 'required|string|max:50',
        ]);

        $user->update($validatedData);

        return new UserResource($user); // Usar el recurso para la respuesta del usuario actualizado
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200); // Respuesta estándar de éxito
    }
}
