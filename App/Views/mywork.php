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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
                        <?php foreach ($user_maintenances as $user_maintenance) { ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#MNT-<?= $user_maintenance['id'] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]"><?= $user_maintenance['title'] ?></p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                        <?= $user_maintenance['type'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                        <?= $user_maintenance['state'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">MAQ-<?= $user_maintenance['id_machine'] ?></p>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $user_maintenance['maintentance_date'] ?></td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex space-x-3">
                                        <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/mantenimiento/<?= $user_maintenance["id"] ?>'" aria-label="Ver detalles del mantenimiento #MNT-<?= $user_maintenance["id"] ?>">
                                            <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if($user_maintenance == null) { ?>
                        <p>No se encontraron mantenimientos asignados.</p>
                    <?php } ?>
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
                            <th class="px-6 py-3 text-left text-sm font-semibold"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($user_incidences as $user_incidence) { ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#INC-<?= $user_incidence['id'] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]"><?= $user_incidence['name'] ?></p>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]"><?= $user_incidence['description'] ?></p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $user_incidence['priority'] ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $user_incidence['state'] ?></span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $_SESSION['user']['id'] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $_SESSION['user']['name'] ?></td>
                                <td class="px-6 py-4 text-sm">
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
                            <?php foreach ($user_machines as $user_machine) { ?>
                                <tr id="machine<?= $user_machine["id"] ?>" class="hover:bg-gray-50" role="row">
                                    <td class="px-6 py-4 text-sm text-gray-900" role="cell">#MAQ-<?= $user_machine["id"] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900" role="cell">
                                        <p class="truncate max-w-[200px]"><?= $user_machine["name"] ?></p>
                                    </td>
                                    <td class="px-6 py-4" role="cell"><?= $user_machine["serial_num"] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900" role="cell">USR-<?= $_SESSION['user']['id'] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900" role="cell"><?= $_SESSION['user']['name'] ?></td>
                                    <td class="px-6 py-4 text-sm" role="cell">
                                        <div class="flex space-x-3">
                                            <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/maquina/<?= $user_machine["id"] ?>'" aria-label="Ver detalles de máquina #MAQ-<?= $machine["id"] ?>">
                                                <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                    <?php if($user_machines == null) { ?>
                        <p>No se encontraron maquinas asignadas.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'Layouts/footer.php'; ?>

</html>