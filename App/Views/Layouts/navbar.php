<nav class="bg-custom-blue w-full z-50  top-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center">
            <a href="/inicio">
                <img src="/uploads/img/logo.png" alt="Logo" class="h-12">
            </a>
        </div>
        
        <!--    Hamburger button for mobile -->
        <button id="hamburger-button" type="button" 
            class="hamburger inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300" 
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Abrir menú principal</span>
            <svg class="menuIcon w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <!-- Navigation menu  -->
        <div class="hidden  w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row md:space-x-8 items-center">
                <li>
                    <a href="/inicio" class="nav-button mb-2 flex items-center">
                        <i class="bi bi-house-fill mr-2"></i>
                        Inicio
                    </a>
                </li>
                <?php if(isset($app_user) && $app_user['role'] != 'usuario'){?>
                <li>
                    <a href="/mitrabajo" class="nav-button flex items-center">
                        <i class="bi bi-briefcase-fill mr-2"></i>
                        Mi Trabajo
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="/inventario" class="nav-button flex items-center">
                        <i class="bi bi-box-fill mr-2"></i>
                        Inventario
                    </a>
                </li>
                <?php if(isset($app_user) && $app_user['role'] != 'usuario'){?>
                <li>
                    <a href="/mantenimientos" class="nav-button flex items-center">
                        <i class="bi bi-tools mr-2"></i>
                        Mantenimiento
                    </a>
                </li>
                <?php } ?>
                <li>
                    <a href="/incidencias" class="nav-button flex items-center">
                        <i class="bi bi-exclamation-circle-fill mr-2"></i>
                        Incidencias
                    </a>
                </li>
                <?php if(isset($app_user) && $app_user['role'] == 'administrator'){?>
                <li>
                    <a href="/paneladministrador" class="nav-button flex items-center">
                        <i class="bi bi-shield-fill mr-2"></i>
                        Admin
                    </a>
                </li>
                <?php } ?>
                <li class="ml-6">
                    <a href="/perfil" class="block flex items-center">
                        <img src="<?= $app_user['img'] ?>" alt="Foto de perfil" class="w-10 h-10 rounded-full border-2 border-white">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="/js/bundle.js"></script>

