<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarea', function (Blueprint $table) {

            $table->id("idTar");   // crea por defecto el atributo id como clave primaria autoincremental
            $table->unsignedBigInteger("idUsu");  // CLAVE FORÁNEA 
            $table->text("texto") ;
            $table->boolean("completa")->default(false) ;
            $table->date("fecha") ;

            // Laravel crea por defecto los campos created_at, updated_at
            // que, posteriormente gestionará de forma automática.
            $table->timestamps();

            // Creamos la relación de clave foránea
            $table->foreign("idUsu")->references("idUsu")->on("usuario")
                  ->onDelete("cascade") ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea');
    }
};
