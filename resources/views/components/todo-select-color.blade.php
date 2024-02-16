<select {{ $attributes }} >
    @foreach($colores as $clave => $item)
    <option {{ $seleccionado($item) }} value="{{ $item }}">{{ $clave }}</option>
    @endforeach
</select>