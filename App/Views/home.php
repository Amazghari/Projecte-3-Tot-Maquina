<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>
<body class="bg-custom-light-gray">
    <!-- Navbar superior -->
    <?php include 'Layouts/navbar.php'; ?>

    <div class="w-full overflow-hidden">
        <img src="../../uploads/img/mapa.jpg" alt="Banner" class="banner-image">
    </div>
    <!-- Contenedor principal con padding-top para compensar el navbar fijo -->
    <div class="container mx-auto px-4 py-8">
        <!-- Título y botón de nueva incidencia -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Incidencias</h2>
            <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                Nueva Incidencia
            </button>
        </div>

        <!-- Tabla de incidencias -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-custom-blue text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Prioridad</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">ID Máquina</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Fecha Inicio</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Título</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Ejemplo de fila 1 -->
                    <tr class="hover:bg-custom-light-gray ">
                        <td class="px-6 py-4 text-sm ">#INC-001</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                Pendiente
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">
                                Alta
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm ">MAQ-123</td>
                        <td class="px-6 py-4 text-sm ">15/03/2024</td>
                        <td class="px-6 py-4 text-sm ">
                            <p class="truncate max-w-[200px]">Fallo sistema refrigeración</p>
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
                        <td class="px-6 py-4 text-sm text-gray-900">#INC-002</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                Completado
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                Media
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">MAQ-456</td>
                        <td class="px-6 py-4 text-sm text-gray-900">14/03/2024</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <p class="truncate max-w-[200px]">Fallo sistema refrigeración</p>
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

<!-- Footer -->
<?php include 'Layouts/footer.php'; ?>
</body>
</html>