@extends('layouts.appadmin')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection