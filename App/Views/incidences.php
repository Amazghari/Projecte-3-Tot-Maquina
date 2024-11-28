<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>
<body class="bg-custom-light-gray">
    <!-- Navbar superior -->
    <?php include 'Layouts/navbar.php'; ?>

    <!-- Contenedor principal con padding-top para compensar el navbar fijo -->
    <div class="container mx-auto px-4 py-8">
        <!-- Título y botón de nueva incidencia -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold flex align-center justify-center text-custom-blue">Gestión de Incidencias</h2>
            <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                Nueva Incidencia
            </button>
        </div>


<!-- Tabla de inventario -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Trabajador</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">#INC-001</td>
                            <td class=" py-4 text-sm text-gray-900">
                            <div class="max-w-xs mx-auto">
                                <select id="opciones" class="w-full bg-custom-blue text-white py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="opcion0">---</option>
                                    <option value="opcion1">Opción 1</option>
                                    <option value="opcion2">Opción 2</option>
                                    <option value="opcion3">Opción 3</option>
                                    <option value="opcion4">Opción 4</option>
                                </select>
                            </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="max-w-xs mx-auto">
                                <select id="opciones" class="w-full bg-custom-blue text-white py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="opcion0">---</option>
                                    <option value="opcion1">Opción 1</option>
                                    <option value="opcion2">Opción 2</option>
                                    <option value="opcion3">Opción 3</option>
                                    <option value="opcion4">Opción 4</option>
                                </select>
                            </div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-3">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22c1.104 0 2-.896 2-2H10c0 1.104.896 2 2 2zm6-6V10c0-3.314-2.686-6-6-6s-6 2.686-6 6v6l-2 2v1h16v-1l-2-2z"/>
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