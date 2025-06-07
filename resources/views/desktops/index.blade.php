<!-- resources/views/desktops/index.blade.php -->
@extends('layouts.appadmin')

@section('content')
<div class="container">
    <h1>Lista de Equipos</h1>
    
    @include('partials.alert')
    
    <div class="mb-3">
        <a href="{{ route('desktops.create') }}" class="btn btn-primary">
            Nuevo Equipo
        </a>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($desktops as $desktop)
                <tr>
                    <td>{{ $desktop->nombre }}</td>
                    <td>{{ $desktop->descripcion }}</td>
                    <td>
                        <a href="{{ route('desktops.show', $desktop) }}" class="btn btn-sm btn-info">
                            Ver
                        </a>
                      @if(auth()->user()->hasRole('superadmin'))
                        <a href="{{ route('desktops.edit', $desktop) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('desktops.destroy', $desktop) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este equipo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Eliminar
                            </button>
                        </form>
                      @endif
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $desktops->links() }}
</div>



@endsection