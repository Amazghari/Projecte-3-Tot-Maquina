<nav class="bg-custom-blue w-full z-50  top-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center">
            <a href="/inicio">
                <img src="/uploads/img/logo.png" alt="Logo" class="h-12">
            </a>
        </div>
        
        <!-- Botón hamburguesa para móvil -->
        <button id="hamburger-button" type="button" 
            class="hamburger inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300" 
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Abrir menú principal</span>
            <svg class="menuIcon w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <!-- Menú de navegación -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row md:space-x-8 items-center">
                <li>
                    <a href="/inicio" class="nav-button">Inicio</a>
                </li>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] != 'usuario'){?>
                <li>
                    <a href="/mitrabajo" class="nav-button">Mi Trabajo</a>
                </li>
                <?php } ?>
                <li>
                    <a href="/inventario" class="nav-button">Inventario</a>
                </li>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] != 'usuario'){?>
                <li>
                    <a href="/mantenimientos" class="nav-button">Mantenimiento</a>
                </li>
                <?php } ?>
                <li>
                    <a href="/incidencias" class="nav-button">Incidencias</a>
                </li>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'administrator'){?>
                <li>
                    <a href="/paneladministrador" class="nav-button">Admin</a>
                </li>
                <?php } ?>
                <li class="ml-6">
                    <a href="/perfil" class="block">
                        <img src="/uploads/img/perfil.png" alt="Foto de perfil" class="w-10 h-10 rounded-full border-2 border-white">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="../js/navbar.js"></script> <!-- Asegúrate de que esta ruta sea correcta -->
