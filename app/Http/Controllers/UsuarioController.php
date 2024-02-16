<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic ;
use Illuminate\Validation\Rule ;
use Illuminate\Validation\Rules\File ;
use Illuminate\Validation\Rules\Password ;
use Illuminate\Support\Facades\Storage ;

use App\Models\Usuario ;

class UsuarioController extends Controller
{

    /**
     * @param Request $request
     * @return void
     */
    public function listar(Request $request, Usuario $usuario)
    {
        // recuperamos el usuario logueado
        //$usuario = Usuario::find($id) ;

        dd($usuario->tareas()) ;

        // llamamos a la vista y le pasamos las tareas del usuario
        return view("usuario.main", [
                                        "tareas" => $usuario->tareas(),
                                    ]) ;
    }

    /**
     */
    public function main(Request $request)
    {
        $datos = Usuario::all() ;
        // llamamos a la vista y le pasamos las tareas del usuario
        return view("dashboard", [
                                    "usuarios" => $datos,
                                 ]) ;
    }

    /**
     * @param Request $request
     */
    public function perfil (Request $request) {

        $fondo = $request->input("fondo") ;
        $tinta = $request->input("tinta") ;

        return view("usuario.perfil", [
                                        "fondo" => "#{$fondo}",
                                        "tinta" => "#{$tinta}",
                                        "tintaActiva" => true,
                                        "usuarios" => ["pepe", "luis", "marta", "roberto", "julio", "alejandro", "dani", "alberto", "josé antonio", "german", "iván" ],
                                        //"usuarios" => [],
                                      ]) ;

    }


    /**
     */
    public function actualizar(Request $request)
    {


        $request->validate([
                            //"email"    => "required|string|email|min:10|max:100",
                            //"nombre"   => "required|string|min:10",
                            //"password" => ["required", Password::min(8)->letters()->symbols()],
                            //"telefono" => "numeric|between:100,200",
                            //"twitter"  => [ new \App\Rules\Twitter ],

                            "foto"     => [ File::types(["jpg", "png"])
                                                    ->min("1kb") ],
                          ]) ;




        $nombre = $request->file("foto")->getClientOriginalName() ;
        $request->file("foto")->storeAs("public", $nombre) ;

        $webp = ImageManagerStatic::make(Storage::disk("public")->get($nombre))->encode("webp");

        Storage::disk("public")->put("nombre.webp", $webp) ;

        echo "ACTUALIZANDO PERFIL" ;

    }
}
