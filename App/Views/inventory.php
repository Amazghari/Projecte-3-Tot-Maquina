<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Maquinaria</h2>
            <input type="text" id="search" placeholder="Buscar máquinas..." class="border rounded-md px-4 py-2" aria-label="Buscar máquinas" />
            <a href="/asignar" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer" aria-label="Asignar Técnico">
                Asignar Técnico
            </a>
            <label for="modal-toggle" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer" aria-haspopup="dialog" aria-controls="modal">
                Nueva Máquina
            </label>
        </div>

        <!-- Tabla de inventario -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full" role="table">
                    <caption class="sr-only">Lista de maquinaria disponible</caption>
                    <thead class="bg-custom-blue text-white">
                        <tr role="row">
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nºserie</th>
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
                                        <button class="text-red-600 hover:text-red-800" data-id="<?= $machine["id"] ?>" id="eliminarMaquina" aria-label="Eliminar máquina #MAQ-<?= $machine["id"] ?>">
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

    <!-- Modal usando solo CSS -->
    <input type="checkbox" id="modal-toggle" class="hidden">
    <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal" role="dialog" aria-modal="true">
        <div class="modal-content p-4 mt-20">
            <div class="flex justify-between items-center pb-3 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Nueva Máquina</h3>
                <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-800" aria-label="Cerrar modal">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>

            <form class="space-y-4 mt-4" action="/inventario/añadir" method="post" enctype="multipart/form-data">
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="machineName">Nombre</label>
                    <input type="text" name="machineName" id="machineName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required aria-required="true">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="serialNumber">Nº Serie</label>
                    <input type="text" name="serialNumber" id="serialNumber" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required aria-required="true">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="model">Modelo</label>
                    <input type="text" name="model" id="model" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required aria-required="true">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="manufacturer">Fabricante</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required aria-required="true">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="installationDate">Fecha instalación</label>
                    <input type="date" name="installationDate" id="installationDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required aria-required="true">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="longitude">Longitud</label>
                    <input type="text" name="longitude" id="longitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required aria-required="true">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="latitude">Latitud</label>
                    <input type="text" name="latitude" id="latitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required aria-required="true">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="image">Imagen</label>
                    <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>

                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                    <label for="modal-toggle" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer" aria-label="Cancelar">Cancelar</label>
                    <button type="submit" class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors" aria-label="Guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/machine.js"></script>
</body>

<!-- Footer -->
<?php include 'Layouts/footer.php'; ?>

</html>