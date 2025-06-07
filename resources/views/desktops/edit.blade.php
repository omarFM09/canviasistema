@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Editar Equipo: {{ $desktop->nombre }}</h1>
        <div>
            <a href="{{ route('desktops.show', $desktop) }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver al detalle
            </a>
        </div>
    </div>

    @include('partials.alert')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('desktops.update', $desktop) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre', $desktop->nombre) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                       
                    </div>

                    <div class="col-md-6">
                     
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $desktop->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Actualizar Equipo
                    </button>
                    <a href="{{ route('desktops.show', $desktop) }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection