<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
    
</head>
<body>

    <h1>{{ __("todolist.bienvenida") }}</h1>

    <h3>Tareas del usuario</h3>
    <ul>
        @forelse($tareas as $item)
             <li>{{ $item->fecha->format("d-m-Y") }} 
                 @includeWhen($item->completa, "tarea-completa") 
                 @includeWhen(!$item->completa, "tarea-incompleta")
                </li>
        @empty
            No tienes tareas... ¡Qué suerte!
        @endforelse
    </ul>


</body>
</html>
