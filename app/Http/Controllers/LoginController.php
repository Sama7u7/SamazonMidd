<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Importa la clase Hash
use App\Models\Usuario;
use App\Models\Role;

class LoginController extends Controller
{
    public function valida(Request $request)
{
    $credentials = $request->only('email', 'password');

    $user = Usuario::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        $role = $user->roles()->first(); // Obtiene el primer rol del usuario

        if ($role) {
            switch ($role->name) {
                case 'supervisor':
                    return redirect()->route('supervisor.dashboard');
                    break;
                case 'cliente':
                    return redirect()->route('cliente.dashboard');
                    break;
                case 'encargado':
                    return redirect()->route('encargado.dashboard');
                    break;
                case 'vendedor':
                    return redirect()->route('vendedor.dashboard');
                    break;
                case 'contador':
                    return redirect()->route('contador.dashboard');
                    break;
                // Agrega más casos según tus roles
                default:
                    return redirect()->route('login')->withErrors(['email' => 'Rol no válido']);
                    break;
            }
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Usuario sin rol asignado']);
        }
    } else {
        return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
    }
}


    public function logout(Request $request)
    {
        // Lógica para cerrar sesión
    }
}
