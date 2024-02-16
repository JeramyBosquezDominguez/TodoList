<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UsuarioController ;
use Illuminate\Support\Facades\DB ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('welcome') ;

Route::get('/dashboard', [UsuarioController::class, "main"])->name('dashboard');

Route::get("tareas/{usuario}", [UsuarioController::class, "listar"])->middleware("auth")->name("usuario.tareas") ;

Route::group(["prefix" => "admin",
              "name" => "administrador.",
              "middleware" => ["auth", "perfil:admin"]] , function() {

    Route::get("main", function() {
        echo "Bienvenido administrador. SECCION MAIN" ;
    })->name("main") ;  

    Route::get("tareas", function() {
        echo "Bienvenido administrador. SECCION TAREAS" ;
    })->name("tareas") ;

    Route::get("etiquetas", function() {
        echo "Bienvenido administrador. SECCION ETIQUETAS." ;
    })->name("etiquetas") ;

}) ;

// ########

Route::post("/actualizar", [UsuarioController::class, "actualizar"])->middleware("auth")->name("actualizar") ;
Route::get("/prueba", function() {

    Storage::disk("public")->put("miarchivo.txt", "Este contenido pertenece al archivo MIARCHIVO.TXT. No lo borres, ¿vale? ;) ") ;

}) ;

// ##################




Route::middleware('auth')->group(function ()
{
    Route::get   ('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch ('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
