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

        // return $req -> all();

        $prod = new Producto;

        $prod->Nombre = $req->Nombre;
        $prod->Precio = $req->Precio;
        $prod->Stock = $req->Stock;
        $prod->Categoria_id = $req->Categoria_id;
        $prod->Imagen = $req->Imagen;

        $prod->save();

        return redirect('/Productos/Productos');

    }



    public function edit($ID)
    {

    $prod = producto::find($ID);

    return view('/Productos/formulario-editar') -> with('producto', $prod);

    }

    public function update(Request $req, $ID)
    {

        // return $req -> all();

        $prod = Producto::find($ID);


        $prod->Nombre = $req->Nombre;
        $prod->Precio = $req->Precio;
        $prod->Stock = $req->Stock;
        $prod->Categoria_id = $req->Categoria_id;
        $prod->Imagen = $req->Imagen;
        $prod -> Estado = $req -> Estado;

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