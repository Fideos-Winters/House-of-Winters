<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class productoController extends Controller
{
    //
    public function index()
    {

        $product = producto::all(); // select * from producto

        // return $product;
        return view('/Productos/Productos')->with('producto', $product);

    }

    public function create()
    {

        return view('/Productos/formulario');

    }

public function store(Request $req)
{
    // return $req->all();

    $prod = new Producto;

    $prod->Nombre = $req->Nombre;
    $prod->Precio = $req->Precio;
    $prod->Stock = $req->Stock;
    $prod->Categoria_id = $req->Categoria_id;
    $prod->Imagen = '/imagenes/productos/producto_default.jpg';
    $prod->Imagen_1 = null;
    $prod->Imagen_2 = null;

    $prod->save();

    // Imagen principal
    if ($req->hasFile('Imagen')) {
        $imagen = $req->file('Imagen');
        $nuevo_nombre = 'Producto_'.$prod->ID.'_principal.jpg';
        $ruta = $imagen->storeAs('Imagenes/Productos', $nuevo_nombre, 'public');
        $prod->Imagen = '/storage/'.$ruta;
        $prod->save();
    }

    // Imagen secundaria 1
    if ($req->hasFile('Imagen_1')) {
        $imagen1 = $req->file('Imagen_1');
        $nuevo_nombre1 = 'Producto_'.$prod->ID.'_1.jpg';
        $ruta1 = $imagen1->storeAs('Imagenes/Productos', $nuevo_nombre1, 'public');
        $prod->Imagen_1 = '/storage/'.$ruta1;
        $prod->save();
    }

    // Imagen secundaria 2
    if ($req->hasFile('Imagen_2')) {
        $imagen2 = $req->file('Imagen_2');
        $nuevo_nombre2 = 'Producto_'.$prod->ID.'_2.jpg';
        $ruta2 = $imagen2->storeAs('Imagenes/Productos', $nuevo_nombre2, 'public');
        $prod->Imagen_2 = '/storage/'.$ruta2;
        $prod->save();
    }

    return redirect('/Productos/Productos');
}



    public function edit($ID)
    {

    $prod = producto::find($ID);

    return view('/Productos/formulario-editar') -> with('producto', $prod);

    }
public function update(Request $req, $ID)
{
    $prod = Producto::find($ID);

    $prod->Nombre = $req->Nombre;
    $prod->Precio = $req->Precio;
    $prod->Stock = $req->Stock;
    $prod->Categoria_id = $req->Categoria_id;

    // Imagen principal
    if ($req->hasFile('Imagen')) {
        $imagen = $req->file('Imagen');
        $nuevo_nombre = 'Producto_'.$prod->ID.'_principal.jpg';
        $ruta = $imagen->storeAs('Imagenes/Productos', $nuevo_nombre, 'public');
        $prod->Imagen = '/storage/'.$ruta;
    }

    // Imagen secundaria 1
    if ($req->hasFile('Imagen_1')) {
        $imagen1 = $req->file('Imagen_1');
        $nuevo_nombre1 = 'Producto_'.$prod->ID.'_1.jpg';
        $ruta1 = $imagen1->storeAs('Imagenes/Productos', $nuevo_nombre1, 'public');
        $prod->Imagen_1 = '/storage/'.$ruta1;
    }

    // Imagen secundaria 2
    if ($req->hasFile('Imagen_2')) {
        $imagen2 = $req->file('Imagen_2');
        $nuevo_nombre2 = 'Producto_'.$prod->ID.'_2.jpg';
        $ruta2 = $imagen2->storeAs('Imagenes/Productos', $nuevo_nombre2, 'public');
        $prod->Imagen_2 = '/storage/'.$ruta2;
    }

    $prod->save();

    return redirect('/Productos/Productos');
}

public function destroy($ID)
{

 $producto = Producto::find($ID);
 $producto -> delete();

return redirect('/Productos/Productos');


}


}