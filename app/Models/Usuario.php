<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes ;  // TRAIT

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes ;

    // indicamos al modelo cuál es el nombre real de la tabla
    protected $table = "usuario" ; 

    // indicamos al modelo cuál es el atributo de clave primaria
    protected $primaryKey = "idUsu" ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "nombre",
        "apellido",
        "foto",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password",        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [      
        'password' => 'hashed',        
    ] ;

    /**
     * Creamos una relación UNO A MUCHOS entre el modelo USUARIO y TAREA.
     * Este método devolverá una relación de objetos TAREA asociados con
     * un determinado usuario.
     * TELL DON'T ASK
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function tareas()
    {
        // Utilizamos el método HASMANY para recuperar los modelos de
        // tipo TAREA asociados al USUARIO, dado que un USUARIO tiene
        // varias (hasmany) TAREAS. El método HASMANY se puede escri-
        // bir de varias formas:

        //return $this->hasMany("App\Models\Tarea", "idUsu") ;
        //return $this->hasMany("App\Models\Tarea", "idUsu", "idUsu") ;
        //return $this->hasMany(Tarea::class, "idUsu", "idUsu") ;
        return $this->hasMany(Tarea::class, "idUsu")->get() ;
    }

    /**
     * Devuelve el nombre completo del usuario
     * @return
     */
    public function toString():string {
        return "{$this->apellido}, {$this->nombre}" ;
    }


}
