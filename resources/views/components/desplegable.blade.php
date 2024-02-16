<select name="fondo">
    @foreach($colores as $clave => $item)
        <option value="{{ $item }}" {{ $isSelected($item) ? "selected" : "" }}>{{$clave}}</option>
    @endforeach
</select>