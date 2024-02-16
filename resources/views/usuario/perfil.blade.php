<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
    
</head>
<body @style(["background-color: {$fondo}", "color: {$tinta}" => $tintaActiva ]) >


    @php
        $colores=["Rosa" => "e75480", 
                  "Azul" => "0000ff", 
                  "Verde" => "00ff00",
                  "Amarillo" => "ffff00", 
                  "Morhao'" => "9b59b6", 
                  "Marrón" => "804000",
                  "Negro" => "000000", 
                  "Rojo" => "ff0000",
                  "Blanco" => "ffffff",
                  "Magenta" => "ff00ff",
                  "Gris" => "666666",
                  "Naranja" => "ff8000",
                ] ;
    @endphp
    
    <!-- Esto es un comentario en HTML -->

    {{-- Esto es un comentario en BLADE --}}

    <h1>Perfil de usuario</h1>

    <p>El color de fondo es: {{ $fondo }} </p>
    <p>El color de la tinta es: {{ $tinta }} </p>


    <x-alerta :enabled="is_string('56')">
        <x-slot:titulo class="text-pink-200" >Este es el título del mensaje de alerta</x-slot>
        Esto es un mensaje de Alerta
    </x-alerta>

    <form action="{{ route("colores") }}" method="get">
        <label>Fondo</label>
        <x-desplegable :$colores :selected="$fondo" />

        <br/>

        <label>Tinta</label>
        @foreach($colores as $clave => $item)
            <input type="radio" name="tinta" value="{{ $item }}" @checked($tinta=="#{$item}") />{{$clave}}
        @endforeach

        <br/>

        <input type="text" 
               placeholder="Este control funciona cuando el color no es negro" 
               @disabled($fondo=="#000000")/>

        <br/>
        <button class="middle none center rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Establecer colores</button>
    </form>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
</body>
</html>
