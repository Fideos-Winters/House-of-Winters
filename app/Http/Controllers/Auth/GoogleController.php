<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\empleados;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
$googleUser = Socialite::driver('google')->stateless()->user();
        // Buscar o crear empleado con el correo de Google
$empleado = empleados::updateOrCreate(
    ['Correo' => $googleUser->getEmail()],
    [
        'Nombres'   => $googleUser->getName(),
        'Apellidos' => '', // o 'Google User'
        'Imagen'    => $googleUser->getAvatar(),
        'Rol'       => 'Cajero',
        'Contrasena' => '1234'
    ]
);

        Session::put('empleado', $empleado);

        return redirect('/Inicio')->with('success', 'Bienvenido '.$empleado->Nombres);
    }


        public function logout()
    {
        // Borramos la sesión
        Session::forget('empleado');
        return redirect('/login');
    }
}