<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-[#003366] fixed w-full z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center">
                <img src="App/public/uploads/logo.png" alt="Logo" class="h-12">
            </div>
            
            <!-- Botón hamburguesa para móvil -->
            <button data-collapse-toggle="navbar-default" type="button" 
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300" 
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Abrir menú principal</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            <!-- Menú de navegación -->
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col md:flex-row md:space-x-8 items-center">
                    <li>
                        <a href="/inicio" class="bg-white text-[#003366] hover:bg-[#003366] hover:text-white px-6 py-3 rounded-lg transition duration-300 font-semibold">Inicio</a>
                    </li>
                    <li>
                        <a href="/inventario" class="bg-white text-[#003366] hover:bg-[#003366] hover:text-white px-6 py-3 rounded-lg transition duration-300 font-semibold">Inventario</a>
                    </li>
                    <li>
                        <a href="/mantenimiento" class="bg-white text-[#003366] hover:bg-[#003366] hover:text-white px-6 py-3 rounded-lg transition duration-300 font-semibold">Mantenimiento</a>
                    </li>
                    <li>
                        <a href="/incidencias" class="bg-white text-[#003366] hover:bg-[#003366] hover:text-white px-6 py-3 rounded-lg transition duration-300 font-semibold">Incidencias</a>
                    </li>
                    <li>
                        <a href="/admin" class="bg-white text-[#003366] hover:bg-[#003366] hover:text-white px-6 py-3 rounded-lg transition duration-300 font-semibold">Admin</a>
                    </li>
                    <!-- Foto de perfil -->
                    <li class="ml-6">
                        <a href="/perfil" class="block">
                            <img src="<?=$_SESSION['user']['img'] ?? 'ruta/imagen/default.png' ?>" 
                                 alt="Foto de perfil" 
                                 class="w-10 h-10 rounded-full border-2 border-white">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal con padding-top para compensar el navbar fijo -->
    <div class="container mx-auto pt-20 px-4">
        <!-- Aquí irá el contenido de la página -->
    </div>
</body>
</html>