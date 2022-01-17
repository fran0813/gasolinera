<table>
    <thead>
        <tr>
            <th colspan="2">{{ $informacion->empresa }}</th>
        </tr>
        <tr>
            <th colspan="2">NIT: {{ $informacion->nit }}</th>
        </tr>
        <tr>
            <th colspan="2">Tel: {{ $informacion->telefono }}</th>
        </tr>
        <tr>
            <th colspan="2">{{ $informacion->direccion }}</th>
        </tr>
        <tr>
            <th colspan="2">{{ $informacion->ciudad }}</th>
        </tr>
        <tr>
            <th>Fecha</th>
            <th>{{ $venta->created_at->format('m/d/Y') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Producto</td>
            <td>Valor</td>
        </tr>
        @foreach ($venta->productos as $item)
            <tr>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->pivot->valor }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2">{{ $informacion->dian }}</td>
        </tr>
    </tbody>
</table>
