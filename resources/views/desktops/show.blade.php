@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalles del Equipo</h1>
        @if(auth()->user()->hasRole('administrador'))
        <div>
            <a href="{{ route('desktops.edit', $desktop) }}" class="btn btn-warning">Editar</a>
        </div>
        @endif
    </div>
    
    @include('partials.alert')
    
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Información Personal</h5>
                    <p><strong>Nombre:</strong> {{ $desktop->nombre }}</p>
                    <p><strong>Descripcion:</strong> {{ $desktop->descripcion ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection