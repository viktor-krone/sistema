<table>
    <thead>
    <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Comision</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vendedores as $item)
        <tr>
            <td>{{ $item->rut }}</td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->comision }} %</td>
        </tr>
    @endforeach
    </tbody>
</table>
