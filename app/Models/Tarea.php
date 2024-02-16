<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    // indicamos al modelo cuál es el nombre real de la tabla
    protected $table = "tarea" ; 

    // indicamos al modelo cuál es el atributo de clave primaria
    protected $primaryKey = "idTar" ;

    // indicamos al modelo cuáles son los atributos de asignación 
    // masiva.
    protected $fillable = [
        "idUsu", "texto", "fecha",
    ] ;

    /**
     * Nos permite especificar el tipo de dato al que se convertirá
     * el campo de la base de datos indicado como clave del array.
     * @var array
     */
    protected $casts = [
        "fecha" => "date",
    ] ;

    

    /**
     * Devuelve el USUARIO con el que está asociada la TAREA.
     * @return \App\Models\Usuario
     */
    public function usuario(): \App\Models\Usuario
    {
        //return $this->belongsTo("App\Models\Usuario") ;

        // Utilizamos este método si hemos empleado la metodología
        // de Laravel para crear las claves primarias y foráneas.
        //return $this->belongsTo(Usuario::class) ;

        // Si no, lo hacemos como sigue, teniendo en cuenta que 
        // debemos especificar el nombre del atributo de clave
        // foránea. Siempre que éste se llame igual que la clave
        // primaria en el modelo USUARIO.
        return $this->belongsTo(Usuario::class, "idUsu")->first() ;

        // Si los atributos de clave primaria y foránea se llaman
        // de diferente manera, tendré que especificar ambos. El
        // primero ese el de clave foránea.
        //return $this->belongsTo(Usuario::class, "idUsu", "idUsu") ;
    }

    public function etiquetas() 
    {
        return $this->belongsToMany(Etiqueta::class, "tarea_etiqueta", "idTar", "idEti") ;
    }

}
