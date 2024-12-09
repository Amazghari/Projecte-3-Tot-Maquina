<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Inicio</title>

    <!-- Includes the Leaflet JS to load and manage the map -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/incidence.js"></script>

    <!-- Includes the CSS for Leaflet to display the map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
</head>
<body class="bg-custom-light-gray">
<?php include 'Layouts/navbar.php'; ?>

<section id="map"> <!-- Adds padding to separate from the navbar -->
        <script src="../../js/mapahome.js"></script>
    <div id="mapid"></div> <!-- Where the map will be rendered -->

</section>
    <!-- Contenedor principal con padding-top para compensar el navbar fijo -->
    <div class="container mx-auto px-4 py-8">
        <!-- Título y botón de nueva incidencia -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Incidencias</h2>
        </div>

        <!-- Tabla de inventario -->
       
        <!-- Tabla de incidencias -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Incidencia</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Descripcion</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Prioridad</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Trabajador</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre Trabajador</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <?php if (isset($incidences)) { ?>
                    <?php foreach ($incidences as $incidence) { ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">#INC-<?= $incidence['id'] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]"><?= $incidence['name'] ?></p>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]"><?= $incidence['description'] ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $incidence['priority'] ?></span>
                            </td> 
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $incidence['state'] ?></span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900"></td>
                            <td class="px-6 py-4 text-sm text-gray-900"></td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-3">
                                    <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/incidencia/<?= $incidence['id'] ?>'" aria-label="Ver detalles de máquina #MAQ-2">
                                        <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                    </button>
                                    <a href="/incidencia/editar/<?= $incidence["id"] ?>" class="cursor-pointer text-blue-600 hover:text-blue-800" aria-label="Editar máquina #MAQ-<?= $incidence["id"] ?>">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                    <button class="text-red-600 hover:text-red-800" data-id="<?= $incidence["id"] ?>" id="eliminarIncidencia" aria-label="Eliminar máquina #MAQ-<?= $incidence["id"] ?>">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- Footer -->


</body>

<?php include 'Layouts/footer.php'; ?>
</html>
