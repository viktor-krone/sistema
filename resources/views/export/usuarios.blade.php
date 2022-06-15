<table>
    <thead>
    <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($usuarios as $user)
        <tr>
            <td>{{ $user->rut }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->apellidoPaterno }}</td>
            <td>{{ $user->apellidoMaterno }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
