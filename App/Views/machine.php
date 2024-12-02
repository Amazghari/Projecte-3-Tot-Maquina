<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../../uploads/img/logopng.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <title>Informacion Maquina</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4 mt-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex flex-row">
                <div class="flex-shrink-0 w-1/2">
                    <img src="<?= $machine['image_url']?>" alt="Máquina" class="h-auto w-full object-cover rounded-lg">
                </div>

                <div class="ml-4 w-1/2 flex flex-col justify-between">
                    <h2 class="text-4xl font-bold text-custom-blue" name="name"><?= $machine['name'] ?></h2>
                    <form id="machineForm" action="/maquina/updateMachine" method="post">
                        <input type="hidden" name="machineId" value="<?= $machine['id'] ?>">
                        <label class="text-xl text-gray-600">ID: <span>#MAQ-<?= $machine['id'] ?></span></label><br>
                        <label class="text-xl text-gray-600">Nombre: <input type="text" name="name" value="<?= $machine['name'] ?>" class="border rounded p-1" aria-label="Nombre de la máquina"></label><br>
                        <label class="text-xl text-gray-600">Modelo: <input type="text" name="model" value="<?= $machine['model'] ?>" class="border rounded p-1" aria-label="Modelo de la máquina"></label><br>
                        <label class="text-xl text-gray-600">Fecha de Instalación: <input type="date" name="installation_date" value="<?= $machine['installation_date'] ?>" class="border rounded p-1" aria-label="Fecha de instalación"></label><br>
                        <label class="text-xl text-gray-600">Técnico Responsable: <input type="text" name="manufacturer" value="<?= $machine['manufacturer'] ?>" class="border rounded p-1" aria-label="Técnico responsable"></label><br>
                        <label class="text-xl text-gray-600">Número de Incidencias: <span><br>5</span></label><br>
                        <label class="text-xl text-gray-600">Longitud: <input type="text" name="latitude" value="<?= $machine['longitude']?>" class="border rounded p-1" aria-label="Longitud"></label><br>
                        <label class="text-xl text-gray-600">Latitud: <input type="text" name="longitude" value="<?= $machine['latitude']?>" class="border rounded p-1" aria-label="Latitud"></label><br>
                        <button type="submit" class="mt-4 bg-custom-blue text-white px-4 py-2 rounded-lg" aria-label="Guardar cambios">Guardar Cambios</button>
                    </form>
                </div>
            </div>

            <div id="map" class="mt-6" style="height: 400px;"></div>

            <div class="flex justify-between items-center mb-6 mt-8">
                <h2 class="text-2xl font-bold text-custom-blue">Lista de Incidencias</h2>
                <label class="bg-custom-blue text-white px-4 py-2 rounded-lg">
                    Incidencias completadas: 1
                </label>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID Incidencia</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nºserie</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Prioridad</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID Trabajador</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre Trabajador</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#INC-001</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]">Incidencia 1</p>
                                </td>
                                <td class="px-6 py-4">1231232132</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Media</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">En Proceso</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">USR-123</td>
                                <td class="px-6 py-4 text-sm text-gray-900">Miguelito</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex space-x-3">
                                        <button class="text-blue-600 hover:text-blue-800" aria-label="Editar incidencia" title="Editar incidencia">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            <span class="sr-only">Editar incidencia</span>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800" aria-label="Eliminar incidencia" title="Eliminar incidencia">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span class="sr-only">Eliminar incidencia</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-between items-center mb-6 mt-8">
                <h2 class="text-2xl font-bold text-custom-blue">Lista de Mantenimientos</h2>
                <label class="bg-custom-blue text-white px-4 py-2 rounded-lg">
                    Mantenimientos Completados: 1
                </label>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Título</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Tipo</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID Máquina</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#MNT-001</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]">Cambio De Aceite</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Preventivo</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Completado</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">MAQ-123</td>
                                <td class="px-6 py-4 text-sm text-gray-900">15/03/2024</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex space-x-3">
                                        <button class="text-blue-600 hover:text-blue-800" aria-label="Editar mantenimiento" title="Editar mantenimiento">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            <span class="sr-only">Editar mantenimiento</span>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800" aria-label="Eliminar mantenimiento" title="Eliminar mantenimiento">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span class="sr-only">Eliminar mantenimiento</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="/js/machine.js"></script>

    <!-- Footer -->
</body>

<?php include 'Layouts/footer.php'; ?>

</html>