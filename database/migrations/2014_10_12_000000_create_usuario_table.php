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
        Schema::create('usuario', function (Blueprint $table) {

            $table->id("idUsu");
            $table->string("nombre", 100);
            $table->string("apellido", 100);

            $table->string("email")->unique() ;            
            $table->string("password");

            $table->boolean("perfil")->default(false) ;  // true - admin ; false - usuarµmio
            $table->string("foto")->nullable() ;

            $table->timestamps();

            $table->timestamp("deleted_at")->nullable() ;

            //$table->timestamp('email_verified_at')->nullable();
            //$table->rememberToken();           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
