@extends('layouts.appadmin')

@section('content')
<div class="container">
    <h1>Nuevo Equipo</h1>
    
    <form action="{{ route('desktops.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
                
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('desktops.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection