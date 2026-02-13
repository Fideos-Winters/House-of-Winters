<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\empleados;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


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

    $credenciales = [
        'Correo'   => $request->Correo,
        'password' => $request->Contrasena, 
        'Estado'   => 1
    ];

    if (Auth::guard('admin')->attempt($credenciales)) {
        $request->session()->regenerate();
        return redirect('/Inicio');
    }

    return back()->withErrors(['login' => 'Credenciales incorrectas o cuenta inactiva']);
}


public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
}