<table>
    <thead>
    <tr>
        <th>Rut</th>
        <th>Razon</th>
        <th>Giro</th>
        <th>Fantasia</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Direccion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->rut }}</td>
            <td>{{ $cliente->razon }}</td>
            <td>{{ $cliente->giro }}</td>
            <td>{{ $cliente->fantasia }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->direccion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
