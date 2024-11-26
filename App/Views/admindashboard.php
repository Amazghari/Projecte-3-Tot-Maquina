<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/uploads/img/logopng.png" type="image/x-icon">
    <title>Panel Administrador</title>
    <link href="main.css" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen flex flex-col items-center">

    <!-- Barra de navegación fija -->
    <nav class="w-full bg-blue-800 text-white py-4 shadow-md fixed top-0 z-50">
        <div class="text-center font-semibold text-lg">Nav</div>
    </nav>

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
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Username</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Rol</th>
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

    <!-- Espaciado para compensar la barra fija -->
    <div class="w-3/4 max-w-4xl mt-16">
        <!-- Contenedor principal -->
        <div class="bg-white p-6 shadow-lg rounded-md mt-8">
            <!-- Tabla de encabezado -->
            <div class="bg-custom-blue text-white font-bold py-2 px-4 rounded-md flex justify-between">
                <span>Id</span>
                <span>Nom</span>
                <span>Username</span>
                <span>Rol</span>
            </div>

            <div class="bg-white text-black font-bold py-2 px-4 rounded-md flex justify-between">
                <span>17022019</span>
                <span>Marina</span>
                <span>Mgonzalez</span>
                <span>Support</span>
            </div>

            <div class="bg-white text-black font-bold py-2 px-4 rounded-md flex justify-between">
                <span>17024019</span>
                <span>Hugo</span>
                <span>Hperez</span>
                <span>Assistance Service</span>
            </div>

            <!-- Acciones -->
            <div class="flex justify-end mt-6 space-x-4">
                <!-- Botón Eliminar -->
                <button class="bg-custom-blue text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">Eliminar</button>
                <!-- Botón Editar -->
                <button class="bg-custom-blue text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">Editar</button>
            </div>
        </div>
    </div>

</body>
</html>
