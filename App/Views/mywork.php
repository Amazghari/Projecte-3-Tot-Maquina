<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Mi Trabajo </title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray" role="document">
    <?php include 'Layouts/navbar.php'; ?>

    <!-- Notifications Section -->
    <main class="container mx-auto px-4 mt-8" role="main">
        <header class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-custom-blue" id="notificaciones">Notificaciones</h2>
        </header>
        <div class="notification bg-white border-l-4 border-blue-500 text-custom-blue p-4" role="alert" aria-labelledby="notificaciones">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-bold">Notificación</p>
                    <p>Tienes una incidencia pendiente que requiere atención.</p>
                </div>
                <button class="text-red-600 hover:text-red-800" onclick="removeNotification(this)" aria-label="Eliminar notificación">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="notification bg-white border-l-4 border-blue-500 text-custom-blue p-4 mt-2" role="alert" aria-labelledby="notificaciones">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-bold">Notificación</p>
                    <p>Recuerda revisar las incidencias para mantener el flujo de trabajo.</p>
                </div>
                <button class="text-red-600 hover:text-red-800" onclick="removeNotification(this)" aria-label="Eliminar notificación">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </main>

    <script>
        function removeNotification(button) {
            const notification = button.closest('.notification');
            notification.remove();
        }
    </script>

    <div class="container mx-auto px-4 ">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Mis Mantenimientos</h2>
        </div>

        <!-- Maintenance table -->
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
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    Preventivo
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Completado
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">MAQ-123</td>
                            <td class="px-6 py-4 text-sm text-gray-900">15/03/2024</td>
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
   
</div>

<div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Mis Incidencias</h2>
           
        </div>


   
        <!-- Inventory table -->
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
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6 mt-8">
        <h2 class="text-2xl font-bold text-custom-blue">Mis Maquinas</h2>

    </div>

    
    <!-- Inventory table -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="table-responsive">
            <table class="min-w-full" role="table">
                <caption class="sr-only">Lista de maquinaria disponible</caption>
                <thead class="bg-custom-blue text-white">
                    <tr role="row">
                        <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nº serie</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">ID Encargado</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nombre Encargado</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($machines as $machine) { ?>
                        <tr id="machine<?= $machine["id"] ?>" class="hover:bg-gray-50" role="row">
                            <td class="px-6 py-4 text-sm text-gray-900" role="cell">#MAQ-<?= $machine["id"] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900" role="cell">
                                <p class="truncate max-w-[200px]"><?= $machine["name"] ?></p>
                            </td>
                            <td class="px-6 py-4" role="cell"><?= $machine["serial_num"] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900" role="cell">USR-123</td>
                            <td class="px-6 py-4 text-sm text-gray-900" role="cell">Miguelito</td>
                            <td class="px-6 py-4 text-sm" role="cell">
                                <div class="flex space-x-3">
                                    <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/maquina/<?= $machine["id"] ?>'" aria-label="Ver detalles de máquina #MAQ-<?= $machine["id"] ?>">
                                        <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                    </button>
                                    <a href="/inventario/editar/<?= $machine["id"] ?>" class="cursor-pointer text-blue-600 hover:text-blue-800" aria-label="Editar máquina #MAQ-<?= $machine["id"] ?>">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button class="text-red-600 hover:text-red-800" data-id="<?= $machine["id"] ?>" id="eliminarMaquina-<?= $machine["id"] ?>" aria-label="Eliminar máquina #MAQ-<?= $machine["id"] ?>">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
     </div>
    </div>
</body>
<?php include 'Layouts/footer.php'; ?>

</html>