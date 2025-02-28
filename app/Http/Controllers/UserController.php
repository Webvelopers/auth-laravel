<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de importar el modelo User

class UserController extends Controller
{
    // Método para mostrar el formulario de registro
    public function create()
    {
        return view('users.create'); // Vista del formulario de registro
    }

    // Método para guardar los datos del usuario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario en la base de datos
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Encriptar la contraseña
        ]);

        // Redirigir a una página de éxito o a la página de inicio
        return redirect()->route('home')->with('success', 'Usuario registrado exitosamente.');
    }
}
