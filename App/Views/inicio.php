<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>
<body>
    <nav class="bg-[#003366] fixed w-full z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center">
                <img src="../../uploads/img/logopng.png" alt="Logo" class="h-12">
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
                        <a href="/adminpanel" class="bg-white text-[#003366] hover:bg-[#003366] hover:text-white px-6 py-3 rounded-lg transition duration-300 font-semibold">Admin</a>
                    </li>
                    <!-- Foto de perfil -->
                    <li class="ml-6">
                        <a href="/perfil" class="block">
                            <img src="<?=$_SESSION['user']['img'] ?? '../../uploads/img/perfil.png' ?>" 
                                 alt="Foto de perfil" 
                                 class="w-10 h-10 rounded-full border-2 border-white">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal con padding-top para compensar el navbar fijo -->
    <div class="container mx-auto px-4 py-8">
        <!-- Título y botón de nueva incidencia -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-[#003366]">Lista de Incidencias</h2>
            <button class="bg-[#003366] text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                Nueva Incidencia
            </button>
        </div>

        <!-- Tabla de incidencias -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-[#003366] text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Descripción</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Ubicación</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Ejemplo de fila 1 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">#001</td>
                        <td class="px-6 py-4 text-sm text-gray-900">15/03/2024</td>
                        <td class="px-6 py-4 text-sm text-gray-900">Fallo en sistema de climatización</td>
                        <td class="px-6 py-4 text-sm text-gray-900">Edificio A - Planta 2</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                Pendiente
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-3">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Ejemplo de fila 2 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">#002</td>
                        <td class="px-6 py-4 text-sm text-gray-900">14/03/2024</td>
                        <td class="px-6 py-4 text-sm text-gray-900">Iluminación defectuosa</td>
                        <td class="px-6 py-4 text-sm text-gray-900">Edificio B - Planta 1</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                Completado
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-3">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>