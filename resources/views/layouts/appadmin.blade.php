<!DOCTYPE html>
<html lang="es">
<style>
#mobileMenuToggler {
    border: none;
    background: transparent;
    font-size: 1.5rem;
    color: #495057; /* Color que contraste con tu navbar */
    padding: 0.5rem;
    margin-right: 1rem;
    cursor: pointer;
    display: none; /* Oculto por defecto */
}

@media (max-width: 767px) {
    #mobileMenuToggler {
        display: block; /* Visible solo en móviles */
    }
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Panel de Administración</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css" rel="stylesheet"> <!-- Si lo deseas usar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
   
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <button class="navbar-toggler d-lg-none" type="button" id="mobileMenuToggler">
            <i class="fas fa-bars"></i>
        </button>
    
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    
            
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="d-flex justify-content-end d-lg-none p-2">
            <button class="btn btn-sm text-white" id="closeSidebar" 
                    style="background: transparent; border: none; font-size: 1.25rem;">
                <i class="fas fa-times"></i>
            </button>
        </div>
    
            <a href="{{ route('home') }}" class="brand-link">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="" class="img-circle elevation-2" alt="User Image"> -->
                    </div>
                    <div class="info">
                        <a href="{{ route('home') }}" class="d-block">Bienvenido</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        
                      @if(auth()->user()->hasRole('superadmin'))
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Configuración</p>
                            </a>
                        </li>
                      @endif
                       
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i> <!-- Icono de herramientas -->
                                <p>
                                    Mantenimiento
                                    <i class="right fas fa-angle-left"></i> <!-- Flecha indicadora -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                              @if(auth()->user()->hasRole('superadmin'))
                                <li class="nav-item">
                                    <a href="{{ route('desktops.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-box"></i> <!-- Icono de productos -->
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                              @endif
                               
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Aquí iría el contenido principal de cada página -->
                @yield('content')
            </div>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Versión 1.0
            </div>
            <strong>Derechos de autor &copy; 2024 <a href="#">Mi Empresa</a>.</strong> Todos los derechos reservados.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
 


  $(document).ready(function() {
    // Si el mensaje de éxito está presente
    if($('#successMessage').length) {
      setTimeout(function() {
        $('#successMessage').fadeOut();
      }, 3000);  // El mensaje desaparece después de 3 segundos
    }

    // Si el mensaje de error está presente
    if($('#errorMessage').length) {
      setTimeout(function() {
        $('#errorMessage').fadeOut();
      }, 3000);  // El mensaje desaparece después de 3 segundos
    }
  });

 
  document.addEventListener('DOMContentLoaded', function() {
    
    const toggler = document.getElementById('mobileMenuToggler');
const closetoggler = document.getElementById('closeSidebar');
const body = document.body;
const overlay = document.createElement('div');
overlay.className = 'sidebar-overlay';
document.body.appendChild(overlay);

// Alternar menú (abrir/cerrar)
toggler.addEventListener('click', function(e) {
    e.stopPropagation();
    body.classList.toggle('sidebar-open');
});

// Cerrar menú (solo cerrar)
closetoggler.addEventListener('click', function(e) {
    e.stopPropagation();
    body.classList.remove('sidebar-open'); // Cambiado de toggle a remove
});

// Cerrar menú al hacer clic en el overlay
overlay.addEventListener('click', function() {
    body.classList.remove('sidebar-open');
});

// Cerrar menú al hacer clic en enlaces
// Ajustar al cambiar tamaño
window.addEventListener('resize', function() {
    if (window.innerWidth > 991) {
        body.classList.remove('sidebar-open');
    }
});

});

</script>
</body>
</html>
