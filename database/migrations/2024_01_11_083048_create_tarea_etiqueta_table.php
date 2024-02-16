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
        Schema::create('tarea_etiqueta', function (Blueprint $table) {

            $table->id("idTE") ;
            $table->unsignedBigInteger("idTar") ;
            $table->unsignedBigInteger("idEti") ;   

            // clave foránea hacia la tabla tarea
            $table->foreign("idTar")->references("idTar")->on("tarea")
                  ->onDelete("cascade") ;

            // clave foránea hacia la tabla etiqueta
            $table->foreign("idEti")->references("idEti")->on("etiqueta")
                  ->onDelete("cascade") ;
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea_etiqueta');
    }
};
