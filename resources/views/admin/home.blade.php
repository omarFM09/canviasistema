@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Dashboard</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="mb-4">Bienvenido al panel de administración</p>
                    
                    <!-- Sección de Alertas -->
                    <div class="row">
                        <!-- Productos con bajo stock -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="mb-0">Productos con bajo stock (5 o menos)</h5>
                                </div>
                               
                            </div>
                        </div>
                        
                        <!-- Clientes con membresías por vencer -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-danger text-white">
                                    <h5 class="mb-0">Membresías por vencer (próximos 7 días)</h5>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    <!-- Segunda fila de secciones -->
                    <div class="row">
                        <!-- Clientes con membresías activas -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">Clientes con membresías activas</h5>
                                </div>
                             
                            </div>
                        </div>
                        
                        <!-- Clientes próximos a cumplir años -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0">Cumpleaños próximos (7 días)</h5>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection