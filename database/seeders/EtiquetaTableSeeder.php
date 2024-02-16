<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class EtiquetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("etiqueta")->insert([
            "etiqueta" => "deporte",
            "color"    => "#FF69B4	",
        ]) ;
    }
}
