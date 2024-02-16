<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*$this->call([
            EtiquetaTableSeeder::class,
        ]) ;*/

        \App\Models\Etiqueta::factory(20)->create() ;

        // Ejecuto antes la factoría de USUARIO porque hay una clave
        // foránea desde TAREA a USUARIO.
        \App\Models\Usuario::factory(10)->create() ;
        \App\Models\Tarea::factory(10)->create() ;
       
    }
}
