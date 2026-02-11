<?php

namespace App\Http\Controllers;

use App\Models\empleados;
use Illuminate\Http\Request;

class empleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $empl = empleados::all(); // select * from empleados

        // return $empl;
        return view('/equipo/listado')->with('empleados', $empl);

    }

    public function create()
    {

        return view('/Equipo/aEquipo');

    }

    public function store(Request $req)
    {

        // return $req -> all();

        $empld = new empleados;

        $empld->Nombres = $req->Nombres;
        $empld->Apellidos = $req->Apellidos;
        $empld->Correo = $req->Correo;
        $empld->Contrasena = $req->Contrasena;
        $empld->Rol = $req->Rol;
        $empld->Imagen = '/imagenes/empleados/Empleado_default.jpg';

        $empld->save();

        if ($req->hasFile('Imagen')) {
            $imagen = $req->file('Imagen');
            $nuevo_nombre = 'Empleado_'.$empld->ID.'.jpg';
            $ruta = $imagen->storeAs('Imagenes/Empleados', $nuevo_nombre, 'public');
            $empld->Imagen = '/storage/'.$ruta;
            $empld->save();
        }

        return redirect('/equipo/listado');

    }

    public function edit($ID)
    {
        $empl = empleados::find($ID);

        return view('/Equipo/formulario-editar')->with('empleado', $empl);

    }

    public function update(Request $req, $ID)
    {

        $empld = empleados::find($ID);

        $empld->Nombres = $req->Nombres;
        $empld->Apellidos = $req->Apellidos;
        $empld->Correo = $req->Correo;
        $empld->Contrasena = $req->Contrasena;
        $empld->Rol = $req->Rol;
        $empld->Estado = $req->Estado;

        // Manejo especial para archivo
        if ($req->hasFile('Imagen')) {
            $imagen = $req->file('Imagen');
            $nuevo_nombre = 'Empleado_'.$empld->ID.'.jpg';
            $ruta = $imagen->storeAs('Imagenes/Empleados', $nuevo_nombre, 'public');
            $empld->Imagen = '/storage/'.$ruta;
        }

        $empld->save();

        return redirect('/equipo/listado');
    }

    public function destroy($ID)
    {

        $empleados = empleados::find($ID);
        $empleados->delete();

        return redirect('/equipo/listado');

    }
}
