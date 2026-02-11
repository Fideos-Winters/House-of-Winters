<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;


class ComentarioController extends Controller
{
    //
public function index()
    {
    
        $coment = Comentario:: all();//select * from comentarios
        //return $coments;
        return view('/Contacto/Comentarios')-> with('Comentarios', $coment);
    
    }


    public function create()
    {

    return view('Contacto\contacto');


    }



    public function store(Request $req)
    {

    //return $req -> all();
    
    $comenta = new Comentario();


    $comenta -> Correo = $req -> Correo;
    $comenta -> Titulo = $req -> Titulo;
    $comenta -> Sugerencia = $req -> Sugerencia;


    $comenta -> save();

    return redirect('/Contacto/Comentarios');


    }



        public function edit($ID)
{
    $coment = Comentario::find($ID);

    return view('/Contacto/contacto-editar') -> with('comentario', $coment);

}
    


    public function update(Request $req, $ID)
    {

    //return $req -> all();
    
    $comenta = Comentario::find($ID);


    $comenta -> Correo = $req -> Correo;
    $comenta -> Titulo = $req -> Titulo;
    $comenta -> Sugerencia = $req -> Sugerencia;


    $comenta -> save();

    return redirect('/Contacto/Comentarios');


    }

    public function destroy($ID)
{

 $comenta = Comentario::find($ID);
 $comenta -> delete();

return redirect('/Contacto/Comentarios');


}

}


