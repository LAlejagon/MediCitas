@extends('layouts/main')

<div class="container mt-4">
    <h2>Actualizar usuario</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="name">Escribe el nombre</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{ $item->name }}">

                        <label for="email">Escribe el email</label>
                        <input type="email" name="email" id="email" class="form-control" required value="{{ $item->email }}">

                        <label for="address">Escribe la dirección</label>
                        <input type="text" name="address" id="address" class="form-control" required value="{{ $item->direccion }}">

                        <label for="gender">Género</label>
                        <select name="gender" id="gender" class="form-control" required value="{{ $item->gender }}">
                            <option value="male">Masculino</option>
                            <option value="female">Femenino</option>
                        </select>

                        <label for="age">Edad</label>
                        <input type="number" name="age" id="age" class="form-control" required value="{{ $item->age }}">

                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" required value="{{ $item->password }}">

                        <label for="health_history">Historial de Salud</label>
                        <input type="text" name="health_history" id="health_history" class="form-control" required value="{{ $item->health_history }}">

                        <label for="user_type">Tipo de Usuario</label>
                        <select name="user_type" id="user_type" class="form-control" required value="{{ $item->user_type }}">
                            <option value="admin">Admin</option>
                            <option value="user">Usuario</option>
                            <option value="doctor">Doctor</option>
                        </select>

                        <button class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{ route('index')}}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>