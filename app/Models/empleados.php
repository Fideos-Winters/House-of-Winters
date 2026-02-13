<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class empleados extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'empleados';
    protected $primaryKey = 'ID';
    public $timestamps = false; 

        protected $fillable = [
        'Nombres',
        'Apellidos',
        'Correo',
        'Contrasena',
        'Rol',
        'Imagen',
        'Estado'
    ];
    
    public function getAuthPassword()
{
    return $this->Contrasena;
}

}


