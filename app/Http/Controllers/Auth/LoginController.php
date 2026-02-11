<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\empleados;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Correo' => 'required|email',
            'Contrasena' => 'required',
        ]);

        $empleado = empleados::where('Correo', $request->Correo)
            ->where('Contrasena', $request->Contrasena) 
            ->first();

        if ($empleado) {
            Session::put('empleado', $empleado);
            return redirect('/Inicio')->with('success', 'Bienvenido '.$empleado->Nombres);
        }

        return back()->withErrors(['login' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Session::forget('empleado');
        return redirect('/login');
    }
}